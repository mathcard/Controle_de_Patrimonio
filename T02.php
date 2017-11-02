<?php require "modelo.php"; ?>
<?php require "onlyP.php"; ?>

    <div style="margin-left:33%;padding:70px 0">
        <div class="logo">Inclusão de Prédio</div>
        <!-- Main Form -->
        <div class="login-form-1">
            <form id="login-form" class="text-left" method="post" action="T02in.php">
                <div style="width:500px" class="main-login-form">
                    <div class="login-group">
                        <div class="form-group">
                            <label for="pr_nome" class="sr-only">Nome</label>
                            <input type="text" class="form-control" id="pr_nome" name="pr_nome" placeholder="Nome" size="50" required >
                        </div>


                        <div class="form-group">
               
                                        <label for="pr_cep" class="sr-only">CEP</label>
                                        <input type="number" class="form-control" id="pr_cep" name="pr_cep" placeholder="CEP" required >

                        </div>
                        <div class="form-group">
                            <label for="pr_rua" class="sr-only">Logradouro</label>
                            <input type="text" class="form-control" id="pr_rua" name="pr_rua" placeholder="Logradouro" size="60" required >
                        </div>
                        <div class="form-group">
                            <label for="pr_comp" class="sr-only">Complemento</label>
                            <input type="text" class="form-control" id="pr_comp" name="pr_comp" placeholder="Complemento" size="60" required >
                        </div>
                        <div class="form-group">
                            <label for="pr_num" class="sr-only">Número</label>
                            <input type="text" class="form-control" id="pr_num" name="pr_num" placeholder="Número" size="10" required >
                        </div>
                        <div class="form-group">
                            <label for="pr_bairro" class="sr-only">Bairro</label>
                            <input type="text" class="form-control" id="pr_bairro" name="pr_bairro" placeholder="Bairro" size="40" required >
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-3">
                                    <div class="form-group">
                                        <label for="pr_city" class="sr-only">Cidade</label>
                                        <input type="text" class="form-control" id="pr_city" name="pr_city" placeholder="   Cidade" size="50" required >
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <label for="estado" class="sr-only">Estado</label>
                                            <select class="form-control" name="estado" placeholder="estado" required >
                                            <option value="" selected disabled hidden>Estado</option>
                                            <option value="AC">Acre</option>
                                            <option value="AL">Alagoas</option>
                                            <option value="AP">Amapá</option>
                                            <option value="AM">Amazonas</option>
                                            <option value="BA">Bahia</option>
                                            <option value="CE">Ceará</option>
                                            <option value="DF">Distrito Federal</option>
                                            <option value="ES">Espírito Santo</option>
                                            <option value="GO">Goiás</option>
                                            <option value="MA">Maranhão</option>
                                            <option value="MT">Mato Grosso</option>
                                            <option value="MS">Mato Grosso do Sul</option>
                                            <option value="MG">Minas Gerais</option>
                                            <option value="PA">Pará</option>
                                            <option value="PB">Paraíba</option>
                                            <option value="PR">Paraná</option>
                                            <option value="PE">Pernambuco</option>
                                            <option value="PI">Piauí</option>
                                            <option value="RJ">Rio de Janeiro</option>
                                            <option value="RN">Rio Grande do Norte</option>
                                            <option value="RS">Rio Grande do Sul</option>
                                            <option value="RO">Rondônia</option>
                                            <option value="RR">Roraima</option>
                                            <option value="SC">Santa Catarina</option>
                                            <option value="SP">São Paulo</option>
                                            <option value="SE">Sergipe</option>
                                            <option value="TO">Tocantins</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button type="submit" class="login-button"><i class="fa fa-chevron-right"></i></button>
                </div>
                <div class="etc-login-form">
                    <a href="index.php">Voltar</a>
                </div>
            </form>
        </div>
        <!-- end:Main Form -->
    </div>

    <!-- end:Main Form -->

</body>

<script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#pr_rua").val("");
                $("#pr_comp").val("...");
                $("#pr_bairro").val("");
                $("#pr_city").val("");
                $("#pr_num").val("");

            }
            
            //Quando o campo cep perde o foco.
            $("#pr_cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#pr_rua").val("...");
                        $("#pr_comp").val("...");
                        $("#pr_bairro").val("...");
                        $("#pr_city").val("...");
                        $("#pr_num").val("...");
                        $("#estado").val("...");


                        //Consulta o webservice viacep.com.br/
                        $.getJSON("//viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#pr_rua").val(dados.logradouro);
                                $("#pr_comp").val(dados.complemento);
                                $("#pr_bairro").val(dados.bairro);
                                $("#pr_city").val(dados.localidade);
                                $("#estado").val(dados.uf);
                                $("#pr_num").val(dados.gia);

                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>

    </html>
