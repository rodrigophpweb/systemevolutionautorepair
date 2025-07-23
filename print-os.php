<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordem de Serviço | Orçamento </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Michroma&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        @media print {
            .no-print {
                display: none !important;
            }

            body {
                margin: 0;
                padding: 0;
                -webkit-print-color-adjust: exact; /* se quiser manter cores */
            }
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        .colorGold {
            color: #d4af37;
        }

        .bgColorGold {
            background-color: #d4af37;
        }

        header {
            display: flex;
            border: solid 3px #444;
            border-radius: 16px;
            align-items: center;
            justify-content: space-between;

            figure {
                width: 40%;
                margin: 0 auto;

                img {
                    width: 75%;
                    margin: 0 auto;
                    display: block;
                    margin-left: 5%;
                }
            }

            ul {
                width: 55%;
                list-style: none;
                display: flex;
                flex-direction: column;
                align-items: start;
                margin: 0;
                padding: 0;

                li {
                    margin: 0;
                    padding: 0.25rem 0;
                    font-size: .8rem;
                }
            }
        }
        
        .sectionOs {
            text-align: center;
            margin: 0.6rem 0;
            display: flex;
            align-items: center;
            justify-content: space-around;

            h1 {
                font-family: "Michroma", sans-serif;
                font-size: 1.1rem;
                color: #000;
            }

            .divDate {
                display: flex;
                align-items: center;
                font-size: 1.2rem;
                color: #333;

                date {
                    margin-left: 0.5rem;
                    font-weight: bold;
                }
            }
        }

        .ClientVehicle {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: solid 3px #000;
            border-radius: 16px;
            padding: 0.8rem;

            .line {
                width: 100%;
                display: flex;
                justify-content: space-between;
                margin: 0.25rem 0;
                border-bottom: solid 1px #000;
                padding-bottom: 5px;

                span {
                    font-size: .8rem;
                    color: #555;
                }
            }
        }

        .productServices {
            margin: 0.75rem auto;
            border: solid 3px #000;
            border-radius: 16px;
            padding: 0;

            table {
                width: 100%;
                border-collapse: collapse;

                thead tr th:nth-child(1) {
                    border-radius: 14px 0 0 0;
                }

                thead tr:first-child {
                    border-bottom: solid 1px #000;
                }

                thead tr th:nth-child(3) {
                    border-radius: 0 14px 0 0;
                }

                th {
                    font-family: "Michroma", sans-serif;                    
                }

                tr {
                    border-bottom: solid 1px #000;
                }

                tr:last-child {
                    border-bottom: none;
                }
                
                tr th:nth-child(2), 
                tr td:nth-child(2) {
                    border-left: solid 3px #000;
                    border-right: solid 3px #000;
                }

                th, td {
                    padding: 0.35rem;
                    text-align: center;
                    text-transform: uppercase;
                    font-size: .75rem;
                }

                th {
                    font-weight: bold;
                }
            }
        }

        .totalSign {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;

            .danos {
                width: 50%;
                text-align: center;

                h2 {
                    font-family: "Michroma", sans-serif;
                    font-size: .5rem;
                    text-transform: uppercase;
                }

                img {
                    max-width: 100%;
                    height: auto;
                }
            }

            .vlTotalSign {
                width: 50%;
                text-align: center;
                display: flex;
                flex-direction: column;
                justify-content: space-between;

                .totalRS {
                    font-weight: bold;
                    border-radius: 16px;
                    padding: 1rem .5rem;
                    border: solid 2px #000;
                    width: 80%;
                    margin: 0 auto;
                    display: flex;
                    justify-content: space-between;
                    
                    span {
                        font-weight: bold;
                        font-size: 1.1rem;
                        font-family: "Michroma", sans-serif;
                    }
                }
            }

            .signClient {
                text-align: center;
                border-top: solid 2px #000;
                padding-top: .5rem;
                width: 75%;
                margin: 0 auto 2rem;

                img {
                    max-width: 100%;
                    height: auto;
                }
            }
        }
    </style>
    <script>
        function imprimirConteudo() {
            const conteudo = document.getElementById('conteudo-os').innerHTML;
            const janela = window.open('', '', 'height=600,width=800');
            janela.document.write('<html><head><title>Ordem de Serviço</title>');
            janela.document.write('<style>@media print { body { margin: 0; } }</style>');
            janela.document.write('</head><body>');
            janela.document.write(conteudo);
            janela.document.write('</body></html>');
            janela.document.close();
            janela.focus();
            janela.print();
            janela.close();
        }
    </script>
</head>
<body>
    <header>
        <figure>
            <img src="assets/images/logotipo-revolution-auto-repair-os.png" alt="Logotipo Evolution Auto Repair">
        </figure>

        <!-- <div class="fio" style="width:2px; height:75px; background-color:#000; color:#000; border: solid 1px #000"></div> -->

        <ul>
            <li><i class="bi bi-geo-alt-fill"></i> R. Plínio Salgado, 50 - Jd. Peri Peri, 05537-080 - São Paulo - SP</li>
            <li><i class="bi bi-whatsapp"></i> 11 97432-6021</li>
            <li><i class="bi bi-building"></i> CNPJ: 48.309.644/0001-92</li>
        </ul>
    </header>
    <section class="sectionOs">
        <h1>Ordem de Serviço | Orçamento</h1>
        <div class="divDate">
            <span>Data: </span>
            <date id="currentDate">16/07/2025</date>
        </div>
        <span>OS - N.º EVAR-1</span>
    </section>

    <section class="ClientVehicle">
        <div class="line">
            <span><strong>Cliente:</strong> Rodrigo Vieira</span>
            <span><strong>Fone:</strong> (11) 99718-1576</span>
            <span><strong>CPF/CNPJ:</strong> 312.001.858-97</span>
        </div>
        <div class="line">
            <span><strong>Endereço:</strong> Av. Eng. Heitor Antonio Eiras Garcia</span>
            <span><strong>N.</strong> 2651</span>
        </div>

        <div class="line">
            <span><strong>Complemento:</strong> C22</span>
            <span><strong>CEP:</strong> 05564-000</span>
            <span><strong>Bairro:</strong> Peri Peri</span>
            <span><strong>Cidade:</strong> São Paulo</span>
            <span><strong>UF:</strong> SP</span>            
        </div>

        <div class="line">
            <span><strong>Veículo:</strong> GM - Chevrolet / Kadett GSI</span>
            <span><strong>Ano:</strong> 1995</span>
            <span><strong>Placa:</strong> ROD2002</span>
        </div>

        <div class="line">
            <span><strong>Combustível:</strong> Alcool</span>
            <span><strong>VIN:</strong> ASDFGH1234567890</span>
            <span><strong>KM:</strong> 100000</span>
        </div>
    </section>

    <section class="productServices">
        <table>
            <thead class="bgColorGold">
                <tr>
                    <th>Qtde.</th>
                    <th>Descrição do Produto / Serviço</th>
                    <th>Valor R$</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Troca de Óleo e Filtro</td>
                    <td>150,00</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Alinhamento e Balanceamento</td>
                    <td>120,00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Revisão Completa</td>
                    <td>300,00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Troca de Óleo e Filtro</td>
                    <td>150,00</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Alinhamento e Balanceamento</td>
                    <td>120,00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Revisão Completa</td>
                    <td>300,00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Troca de Óleo e Filtro</td>
                    <td>150,00</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Alinhamento e Balanceamento</td>
                    <td>120,00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Revisão Completa</td>
                    <td>300,00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Troca de Óleo e Filtro</td>
                    <td>150,00</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Alinhamento e Balanceamento</td>
                    <td>120,00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Revisão Completa</td>
                    <td>300,00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Revisão Completa</td>
                    <td>300,00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Revisão Completa</td>
                    <td>300,00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Revisão Completa</td>
                    <td>300,00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Revisão Completa</td>
                    <td>300,00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Revisão Completa</td>
                    <td>300,00</td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Revisão Completa</td>
                    <td>300,00</td>
                </tr>
            </tbody>
        </table>
    </section>

    <section class="totalSign">
        <div class="danos">
            <h2>Danos ou Avarias do Veículo</h2>
            <img src="assets/images/danos.png" alt="Danos ou Avarias do Veículo">
        </div>
        <div class="vlTotalSign">
            <div class="totalRS">
                <span class="label">TOTAL R$</span>
                <span class="value">1.500,00</span>
            </div>
            <div class="signClient">
                Assinatura do Cliente
            </div>
        </div>
    </section>
</body>
</html>