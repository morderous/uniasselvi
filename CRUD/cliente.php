<?php

require_once ("php/component.php");
require_once ("php/cliente.php");
include 'nav.php';
?>
<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cliente - Loja UNIASSELVI</title>

    <script src="https://kit.fontawesome.com/5d48a46d27.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!--Style Custom-->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<main>
    <div class="container text-center">
        <h1 class="py-4 bg-warning text-dark rounded"><i class="fas fa-book-reader"></i> Cliente</h1>

        <div class="d-flex justify-content-center">
            <form action=""method="post" class="w-50">
                <div class="pt-2">
                    <?php inputElement("<i class=\"fas fa-fingerprint\"></i>", "ID Cliente", "id_cliente", ""); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class=\"fas fa-id-card-alt\"></i>", "Nome do Cliente", "nome_cliente", ""); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class=\"fab fa-ideal\"></i>", "CPF do Cliente", "cpf_cliente", ""); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("<i class=\"fas fa-envelope\"></i>", "E-mail do Cliente", "email_cliente", ""); ?>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <?php buttonElement("btn-create", "btn btn-success", "<i class=\"fas fa-user-plus\"></i>", "create","dat-toggle='tooltip' data-placement='bottom' title='Create'") ?>
                    <?php buttonElement("btn-read", "btn btn-primary", "<i class=\"fas fa-sync-alt\"></i>", "refresh","dat-toggle='tooltip' data-placement='bottom' title='Refresh'") ?>
                    <?php buttonElement("btn-update", "btn btn-light border", "<i class=\"fas fa-user-edit\"></i>", "update","dat-toggle='tooltip' data-placement='bottom' title='Update'") ?>
                    <?php buttonElement("btn-delete", "btn btn-danger", "<i class=\"fas fa-user-times\"></i>", "delete","dat-toggle='tooltip' data-placement='bottom' title='Delete'") ?>
                </div>
            </form>
        </div>
            <div>
                <!--tabela-->
                <div class="d-flex table-data ">
                    <table class="table table-striped table-dark">
                    <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nome Cliente</th>
                        <th>CPF</th>
                        <th>E-mail</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                        <tbody id="tbody">
                        <?php
                        if (isset($_POST['refresh'])){
                            $result = getData();

                            if ($result){
                                while ($row = mysqli_fetch_assoc($result)){ ?>

                                    <tr>
                                        <td data-id="<?php echo $row['idtb_cliente']?>"><?php echo $row['idtb_cliente'];  ?></td>
                                        <td data-id="<?php echo $row['idtb_cliente']?>"><?php echo $row['nome_cliente'];  ?></td>
                                        <td data-id="<?php echo $row['idtb_cliente']?>"><?php echo $row['cpf_cliente'];  ?></td>
                                        <td data-id="<?php echo $row['idtb_cliente']?>"><?php echo $row['email_cliente'];  ?></td>
                                        <td><i class="fas fa-edit btnedit" data-id="<?php echo $row['idtb_cliente'];?>"></i></td>
                                    </tr>

                        <?php
                                }
                            }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</main>
<?php include 'footer.php';
?>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="../crud/php/cliente.js"></script>
</body>
</html>