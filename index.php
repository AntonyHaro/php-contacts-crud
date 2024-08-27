<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Formulário</title>
        <link rel="stylesheet" href="reset.css" />

        <style>
            :root {
                --text-color: hsl(0, 0%, 27%);
                --secondary-text-color: hsl(212, 100%, 24%);
                --primary-background: hsl(0, 0%, 93%);
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: "Cascadia Code", monospace;
            }

            body {
                background-color: var(--primary-background);
                height: 100vh;
                width: 100vw;
                font-size: 16px;
                display: grid;
                place-content: center;
                transition: 0.3;
            }

            .container {
                width: 500px;
                display: grid;
                gap: 2.5rem;
                border: 2px solid var(--text-color);
                border-bottom: 2px dashed var(--text-color);
                border-radius: 12px;
                padding: 2rem;
                transition: 0.3s;
            }

            .container:hover {
                --text-color: hsl(0, 0%, 63%);
                gap: 4rem;
            }

            .container:hover h1,
            .container:hover span {
                color: var(--secondary-text-color);
            }

            h1 {
                text-align: center;
                color: hsl(0, 0%, 40%);
                margin-bottom: 4%;
                transition: 0.3s;
            }

            form {
                display: grid;
                gap: 0.5rem;
            }

            .info {
                font-size: 0.9em;
                margin-bottom: 4%;
            }

            input,
            button {
                width: 100%;
                outline: none;
                padding: 1rem;
                border-radius: 5px;
                transition: 0.3s;
            }

            input {
                background-color: hsl(0, 0%, 92%);
                border: 1px dashed var(--text-color);
            }

            button {
                cursor: pointer;
                border: 1px solid var(--secondary-text-color);
                color: var(--secondary-text-color);
                font-size: 0.9em;
                font-weight: bold;
            }

            button:hover {
                background-color: var(--secondary-text-color);
                color: hsl(0, 0%, 100%);
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Cadastre-se!</h1>
            <form action="insert.php">
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Digite seu nome"
                />
                <button type="submit">Enviar</button>
            </form>
        </div>
    </body>
</html>
