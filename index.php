<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora kWh</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <h2>Calculadora kWh</h2>

        <form>
            <div class="form-group p-2">
                <label for="qtdHoras">Horas</label>
                <input type="number" class="form-control" id="qtdHoras" placeholder="0">
            </div>
            <div class="form-group p-2">
                <label for="qtdDias">Dias</label>
                <input type="number" class="form-control" id="qtdDias" placeholder="0">
            </div>
            <div class="form-group p-2">
                <label for="potencia">Potencia</label>
                <input type="number" class="form-control" id="potencia" placeholder="0">
            </div>
        </form>

        <p>
            Valor Total: R$<span class="p-2" id="valorTotal">0</span>
        </p>
    </div>

    <script>
        let inputHoras      = document.getElementById('qtdHoras');
        let inputDias       = document.getElementById('qtdDias');
        let inputPotencia   = document.getElementById('potencia');
        let valorTotal      = document.getElementById('valorTotal');

        var qtdHoras    = 0;
        var qtdDias     = 0;
        var potencia    = 0;

        function UpdateValorTotal()
        {
            fetch(`calculadora-kWh.php?qtdHoras=${qtdHoras}&qtdDias=${qtdDias}&potencia=${potencia}`)
                .then((response) => response.json())
                .then((json) => valorTotal.innerHTML = json.valorTotal);
        }

        inputHoras.addEventListener("input", (event) => {
            const thisTarget = event.target;
            qtdHoras = thisTarget.value.length == 0 ? 0 : thisTarget.value;
            UpdateValorTotal();            
        })

        inputDias.addEventListener("input", (event) => {
            const thisTarget = event.target;
            qtdDias = thisTarget.value.length == 0 ? 0 : thisTarget.value;
            UpdateValorTotal();            
        })

        inputPotencia.addEventListener("input", (event) => {
            const thisTarget = event.target;
            potencia = thisTarget.value.length == 0 ? 0 : thisTarget.value;
            UpdateValorTotal();            
        })

    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>