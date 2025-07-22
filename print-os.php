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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        header {
            display: flex;
            border: solid 3px #444;
            border-radius: 16px;
            align-items: center;

            figure {
                width: 50%;
            }

            ul {
                width: 50%;
                list-style: none;
                display: flex;
                flex-direction: column;
                align-items: start;
                margin: 0;
                padding: 0;

                li {
                    margin: 0;
                    padding: 0.5rem 0;
                    font-size: 1rem;
                }
            }
        }
        .sectionOs {
            text-align: center;
            margin: 2rem 0;
            display: flex;
            align-items: center;
            justify-content: space-around;

            h1 {
                font-family: "Michroma", sans-serif;
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
            padding: 1rem;

            .line {
                width: 100%;
                display: flex;
                justify-content: space-between;
                margin: 0.5rem 0;

                span {
                    font-size: 1rem;
                    color: #555;
                }
            }
        }
    </style>
</head>
<body>
    <header>
        <figure>
            <img src="assets/images/brand-evolution-auto-repair.png" alt="Logotipo Evolution Auto Repair" style="width: 100%; max-width: 300px; margin: 0 auto; display: block;">
        </figure>
        <ul>
            <li><i class="bi bi-geo-alt-fill"></i> R. Plinio Salgado nº 50 Peri Peri - SP </li>
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
    </section>

    <section class="ClientVehicle">
        <div class="line">
            <span>Cliente: Rodrigo Vieira</span>
            <span>Fone: (11) 99718-1576</span>
        </div>
        <div class="line">
            <span>Endereço: Av. Eng. Heitor Antonio Eiras Garcia</span>
            <span>N. 2651</span>
        </div>
        <div class="line">
            <span>Complemento</span>
            <span>CEP: 05564-000</span>            

        </div>

        <div class="line">            
            <span>Cidade: São Paulo</span>
            <span>UF: SP</span>
            <span>CPF/CPNJ: 312.001.858-97</span>
        </div>

        <div class="line">
            <span>Veículo: GM - Chevrolet / Kadett GSI</span>
            <span>Ano: 1995</span>
            <span>Placa: ROD2002</span>
        </div>

        <div class="line">
            <span>Combustivel: Alcool</span>
            <span>VIN: ASDFGH1234567890</span>
            <span>KM: 100000</span>
        </div>
    </section>
</body>
</html>