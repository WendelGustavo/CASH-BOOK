<?= $this->extend('default') ?>
<?= $this->section('content') ?>
<section class="mt-2">
    <?php
    $ano = date("Y");
    $mes = date("m");
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
    <script>
    function pdf(){
        var doc = new jsPDF();
        doc.setFontSize(14)
        doc.text(85, 10, "Relatorio")
        doc.setFontSize(11)
        doc.text(10, 30, "Id")
        doc.text(22, 30, "Data")
        doc.text(75, 30, "Descrição")
        doc.text(157, 30, "Valor")
        doc.text(185, 30, "Tipo")
        <?php
        $data = $this->data;
        $numero = 40;
        foreach ($data['moviments'] as $moviment) {
            echo 'doc.text(10, ' . $numero . ', "' . $moviment['id'] . '")
            ';
            echo 'doc.text(22, ' . $numero . ', "' . $moviment['date'] . '")
            ';
            echo 'doc.text(75, ' . $numero . ', "' . $moviment['description'] . '")
            ';
            echo 'doc.text(157, ' . $numero . ', "R$ ' . $moviment['value'] . '")
            ';
            echo 'doc.text(185, ' . $numero . ', "' . $moviment['type'] . '")
            ';
            $numero += 7;
        }
        echo 'doc.text(10, 135, "O saldo atual é de: R$ ' . $data['cash_balance'] . '")
        ';
        ?>
        doc.save('Relatorio.pdf');


    }
</script>
    <style>
        #legal{
            background-color: #f8f9fa!important;
            color: #000;
            align-self: center;
            aling-items: center;
        }
        #legal2{

        }
    </style>

    <form method="post" action="<?= base_url('moviments/filtrar') ?>">
        <div id="header-moviment">
            <div class="input-group">
                <label class="input-group-text" for="inputGroupSelect01">Ano</label>
                <select class="form-select" id="inputGroupSelect01" name="ano">
                    <?php
                    echo "<option value='2022' selected>Selecione o Ano </option>";
                    echo "<option value='2022' >2022</option>";
                    echo "<option value='2021' >2021</option>";
                    echo "<option value='2020' >2020</option>";
                    echo "<option value='2019' >2019</option>";
                    echo "<option value='2018' >2018</option>";
                    echo "<option value='2017' >2017</option>";
                    echo "<option value='2016' >2016</option>";
                    ?>

                </select>
            </div>
            <div class="input-group">
                <label class="input-group-text" for="inputGroupSelect01">Mes</label>
                <select class="form-select" id="inputGroupSelect01" name="mes">
                    <?php
                    echo "<option value='$mes'> Selecione o mes </option>";
                    ?>
                    <option value="1">Janeiro</option>
                    <option value="2">Fevereiro</option>
                    <option value="3">Março</option>
                    <option value="4">Abril</option>
                    <option value="5">Maio</option>
                    <option value="6">Junho</option>
                    <option value="7">Julho</option>
                    <option value="8">Agosto</option>
                    <option value="9">Setembro</option>
                    <option value="10">Outubro</option>
                    <option value="11">Novembro</option>
                    <option value="12">Dezembro</option>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-text" id="basic-addon1">Valor em Caixa</span>
                <input type="text" class="form-control" id="input-cash-balance" value="R$<?php echo $this->data['cash_balance']; ?>" disabled>
            </div>
        </div>
        <div class="col-12 text-center mt-3">
        <button class="btn btn-dark mt-3 p-3 " id="legal"> Fazer Filtragem </button>
        </div>
    </form>
    <div class="container">
    <div class="row">
    <div class="col-12 text-center">
    <table class="table mt-4" id="legal2">
        <thead id="legal" >
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Data</th>
                <th scope="col">Descrição</th>
                <th scope="col">Valor</th>
                <th scope="col">Entrada</th>
                <th scope="col">Saida</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($this->data['moviments'] as $moviment) {
                echo "<tr>
        <td>{$moviment['id']}</td>
        <td>{$moviment['date']}</td>
        <td>{$moviment['description']}</td>
        <td>{$moviment['value']}</td>";
                if ($moviment['type'] == "input") {
                    echo "<td>*</td><td> - </td>";
                } else {
                    echo "<td> - </td><td> * </td>";
                }
                echo "</tr>";
            }
            ?>
        </tbody>
        </table>
                </div>
            </div>
        </div>

            <div class="container">
                <div class="row">
                    <div class="col-12 text-center mt-3">
                        <button type="button" id="legal" class="btn btn-dark p-3  mb-5" onclick="pdf()" >Gerar PDF de relatório filtrado</button>
                    </div>
                </div>
            </div>
</section>

<?= $this->endSection() ?>