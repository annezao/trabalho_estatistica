<?php 
$totalPessoas = 0;
$homem = 0;
$saidaP ='';
$totalPessoasF = 0;

$sql = "SELECT count(*) as qtd_pessoas FROM tb_usuario;";
            $result = mysqli_query($db, $sql) or die(mysqli_error($db));
             if (mysqli_num_rows($result) > 0) { 
                while($row = mysqli_fetch_assoc($result)) {  
                    $totalPessoas = $row['qtd_pessoas'];                    
                }
             }

$sql = "SELECT count(*) as qtd_pessoas FROM tb_usuario WHERE sex = 'homem';";
            $result = mysqli_query($db, $sql) or die(mysqli_error($db));
             if (mysqli_num_rows($result) > 0) { 
                while($row = mysqli_fetch_assoc($result)) {  
                    $homem = $row['qtd_pessoas'];                    
                }
             }

            // $saidaP .= "<br><strong>Homens: </strong>".$homem;
            // $saidaP .= "<br><strong>Mulheres: </strong>".($totalPessoas - $homem). "</div>";

$sql = "SELECT count(*) as qtd_pessoas FROM tb_usuario WHERE failedLogin > 0;";
            $result = mysqli_query($db, $sql) or die(mysqli_error($db));
             if (mysqli_num_rows($result) > 0) { 
                while($row = mysqli_fetch_assoc($result)) {  
                    $totalPessoasF = $row['qtd_pessoas'];                    
                }
             }


             //$saidaP .= "<div class='col-md-6'><strong>Probabilidade de ser homem: </strong>".(($homem/$totalPessoas)*100)." %";
            // $saidaP .= "<br><strong>Probabilidade de ser mulher: </strong>".((($totalPessoas - $homem)/$totalPessoas) * 100)." %</div>";
             //$saidaP .= "<hr>";

             $saidaP .= "<hr><div class='col-md-6' style='text-align:left;'><dl><dt>Tendo em vista a quantidade de usuários cadastrados";
             $saidaP .= " é de ".$totalPessoas." pessoas, qual a probabilidade um usuário";
             $saidaP .= " ser um homem ou uma mulher?</dt>";
             $saidaP .= "<dd>".round((1/$totalPessoas) * 100, 2)." %</dd>";
             $saidaP .= "<br><dt>Sabendo que a quantidade de homens é de ".$homem." e mulheres ".($totalPessoas - $homem).", ";
             $saidaP .= "qual a probabilidade de um homem ter cometido um erro no login dentre as 15 vezes?</dt>";
             $saidaP .= "<dd>".round(($homem/15 * 100), 2)." %</dd>";
             $saidaP .= "<br><dt>Se ".$totalPessoasF." de ".$totalPessoas." usuários cometeram um erro ao fazer login, e sabendo que ";
             $saidaP .= "a quantidade de homens é de ".$homem." e mulheres ".($totalPessoas - $homem).", ";
             $saidaP .= "qual a probabilidade de uma mulher ter cometido três erros?</dt>";
             $saidaP .= "<dd>".round((($totalPessoas - $homem)/5)/15 * 100, 2)." %</dd></dl></div>";
             $saidaP .= "<div div class='col-md-6'><p><strong>Simulador</strong><br></div>";
             $saidaP .= "<input type='text'onkeydown='registerKeySimulator(event)' minlength=5 maxlength=5><br><br>";
             $saidaP .= "<button type='submit'  class='btn' >Entrar</button>";
             $saidaP .= "<div id='resultSimulator'></div></div>";
?>