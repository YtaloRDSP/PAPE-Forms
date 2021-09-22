function geraDoc() {
    $( "#carregar" ).removeClass( "sr-only" )
    $("#botao").prop("disabled", true);
    senha = document.getElementById('senha').value
    id = document.getElementById('id').value
    if (document.getElementById('doc').value == '') {
        alert("Selecione um documento")
        return null
    }
    if (document.getElementById('doc').value == 'rel') {
        parcela = Number(document.getElementById('parcela').value)
        periodoMensal = document.getElementById('periodoMensal').value
        chMensal = Number(document.getElementById('chMensal').value)
        if ((senha == '' || id == '' || parcela == 0 || periodoMensal == '' || chMensal == 0)) {
            alert("Preencha todos os itens")
            return null
        }
        var arquivo = "assets/word/"
        if (parcela == 1) arquivo += "rel1.docx"
        else arquivo += "Rel.docx"
        dts = datas(periodoMensal)
    }

    if (document.getElementById('doc').value == 'plano') {
        tutor = document.getElementById('tutor').value
        if ((senha == '' || tutor == '')) {
            alert("Preencha todos os itens")
            return null
        }
        var arquivo = "assets/word/"
        arquivo += "plano" + tutor + ".docx"
    }

    var envio = new XMLHttpRequest();
    envio.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            if (this.responseText == '') {
                alert("Dados Inválidos!")
            } else {
                pack = JSON.parse(this.responseText)
                now = new Date
                if (document.getElementById('doc').value == 'plano') {
                    arquivo = "assets/word/plano" + tutor + pack['Parcelas'] + ".docx"
                }
                meses = [
                    'Janeiro',
                    'Fevereiro',
                    'Março',
                    'Abril',
                    'Maio',
                    'Junho',
                    'Julho',
                    'Agosto',
                    'Setembro',
                    'Outubro',
                    'Novembro',
                    'Dezembro'
                ]

                function loadFile(url, callback) {
                    PizZipUtils.getBinaryContent(url, callback);
                }

                loadFile(arquivo, function(error, content) {
                    if (error) { throw error };

                    function replaceErrors(key, value) {
                        if (value instanceof Error) {
                            return Object.getOwnPropertyNames(value).reduce(function(error, key) {
                                error[key] = value[key];
                                return error;
                            }, {});
                        }
                        return value;
                    }

                    function errorHandler(error) {
                        console.log(JSON.stringify({ error: error }, replaceErrors));

                        if (error.properties && error.properties.errors instanceof Array) {
                            const errorMessages = error.properties.errors.map(function(error) {
                                return error.properties.explanation;
                            }).join("\n");
                            console.log('errorMessages', errorMessages);
                        }
                        throw error;
                    }

                    var zip = new PizZip(content);
                    var doc;
                    try {
                        doc = new window.docxtemplater(zip);
                    } catch (error) {
                        errorHandler(error);
                    }

                    if (document.getElementById('doc').value == 'rel') {
                        doc.setData({
                            nome: pack['Nome'],
                            cpf: pack['CPF'],
                            rg: pack['RG'],
                            email: pack['Email'],
                            fone: pack['Fone'],
                            bolsa: pack['Bolsa'],
                            proc: pack['Procur'],
                            periodoTotal: pack['PeriodoTotal'],
                            ch: pack['CargaTotal'],
                            parcelaTotal: pack['Parcelas'],
                            mesNome: meses[Number(dts[5].split('/')[1]) - 1],
                            parcela: parcela,
                            periodoMensal: periodoMensal,
                            chMensal: chMensal,

                            inicio: dts[0],
                            sabados: dts[1],
                            sextas: dts[2],
                            quintas: dts[3],
                            quartas: dts[4],
                            fim: dts[5],
                            fimdt: dts[5].split('/')[0]
                        });
                    } else {
                        doc.setData({
                            nome: pack['Nome'],
                            cpf: pack['CPF'],
                            email: pack['Email'],
                            fone: pack['Fone'],
                            bolsa: pack['Bolsa'],
                            edital: pack['Edital'],
                            proc: pack['Procur'],
                            periodoTotal: pack['PeriodoTotal'],
                            vigencia: pack['Parcelas'] + ' meses',
                            curso: pack['Curso'],
                            turma: pack['Turma'],
                            anoEntrada: pack['AnoEntrada'],
                            matricula: pack['Matricula'],
                            nasc: pack['Nascimento']
                        });
                    }
                    try {
                        doc.render();
                    } catch (error) {
                        errorHandler(error);
                    }

                    var out = doc.getZip().generate({
                        type: "blob",
                        mimeType: "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
                    })
                    if (document.getElementById('doc').value == 'rel') {
                        saveAs(out, 'Relatório - ' + pack['Nome'] + " - Mes " + meses[Number(dts[5].split('/')[1]) - 1] + ".docx")
                    } else saveAs(out, 'Plano - ' + pack['Nome'] + ".docx")
                })
            }
        }
    };
    envio.open("GET", "assets/database/dados_bolsista.php?senha=" + senha + "&id=" + id, true);
    envio.send();
    $( "#carregar" ).addClass( "sr-only" )
    $("#botao").prop("disabled", false);
}

function datas(s) {
    let sep = s.split(' ')
    inicio = sep[0]
    fim = sep[2]
    console.log(inicio + ' a ' + fim)
    d1 = new Date()
    d2 = new Date()
    d1.setFullYear(Number(inicio.split('/')[2]), Number(inicio.split('/')[1]) - 1, Number(inicio.split('/')[0]))
    d2.setFullYear(Number(fim.split('/')[2]), Number(fim.split('/')[1]) - 1, Number(fim.split('/')[0]))
    let stmDatas = []
    for (i = 0; i < 4; i++) {
        stmDatas.push('')
    }
    if (d1.getTime() < d2.getTime()) {
        dIter = d1
        while (dIter.getTime() < d2.getTime()) {
            if (dIter.getDay() == 6 && !feriado(dIter.getDate(), dIter.getMonth())) {
                let dia = dIter.getDate() < 10 ? '0' + dIter.getDate() : dIter.getDate()
                let mesCor = Number(dIter.getMonth()) + 1
                let mes = mesCor < 10 ? '0' + mesCor : mesCor
                stmDatas[0] += dia + "/" + mes + "/" + dIter.getFullYear() + " "
            } else if (dIter.getDay() == 5 && !feriado(dIter.getDate(), dIter.getMonth())) {
                let dia = dIter.getDate() < 10 ? '0' + dIter.getDate() : dIter.getDate()
                let mesCor = Number(dIter.getMonth()) + 1
                let mes = mesCor < 10 ? '0' + mesCor : mesCor
                stmDatas[1] += dia + "/" + mes + "/" + dIter.getFullYear() + " "
            } else if (dIter.getDay() == 4 && !feriado(dIter.getDate(), dIter.getMonth())) {
                let dia = dIter.getDate() < 10 ? '0' + dIter.getDate() : dIter.getDate()
                let mesCor = Number(dIter.getMonth()) + 1
                let mes = mesCor < 10 ? '0' + mesCor : mesCor
                stmDatas[2] += dia + "/" + mes + "/" + dIter.getFullYear() + " "
            } else if (dIter.getDay() == 3 && !feriado(dIter.getDate(), dIter.getMonth())) {
                let dia = dIter.getDate() < 10 ? '0' + dIter.getDate() : dIter.getDate()
                let mesCor = Number(dIter.getMonth()) + 1
                let mes = mesCor < 10 ? '0' + mesCor : mesCor
                stmDatas[3] += dia + "/" + mes + "/" + dIter.getFullYear() + " "
            }
            dIter.setDate(dIter.getDate() + 1)
        }
        for (i = 0; i < 4; i++) {
            stmDatas[i] = stmDatas[i].substr(0, stmDatas[i].length - 1)
        }
    }
    return [inicio, stmDatas[0], stmDatas[1], stmDatas[2], stmDatas[3], fim]
}

function feriado(dia, mes) {
    let feriados = [
        [1, 0],
        [21, 3],
        [1, 4],
        [3, 5],
        [7, 8],
        [12, 9],
        [2, 10],
        [15, 10],
        [25, 11]
    ];
    for (i of feriados) {
        if (dia == i[0] && mes == i[1]) return true
    }
    return false
}