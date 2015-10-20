<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-18 21:49:30
         compiled from "/var/www/html/app/app/templates/ssn/ssn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11667664775488bf13ca7e89-31381839%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0652562cf0d5397b5a44c37301f97758ba91509b' => 
    array (
      0 => '/var/www/html/app/app/templates/ssn/ssn.tpl',
      1 => 1424292025,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11667664775488bf13ca7e89-31381839',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5488bf13ce35e4_44201665',
  'variables' => 
  array (
    'headtpl' => 0,
    'footertpl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5488bf13ce35e4_44201665')) {function content_5488bf13ce35e4_44201665($_smarty_tpl) {?>

<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['headtpl']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ($_tmp1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="row">
    <form id='ajaxform'  method="POST" action="app.php?page=ssn&action=ssn" class="form" role="form">

        <div id="gray_background" class="row bordered shadow">

            <div class="col-md-12 margin20">
                <div class="col-md-12 margin20 border-bottom">
                    <h3 class="col-md-6 h3margin0 margin12">Wybierz Metodę Uczenia Sztucznej Sieci Neuronowej:</h3>
                    <div class="col-md-6">
                        <select id="select_method" class="col-md-2 form-control margin12">
                            <option value="1">------------------</option>
                            <option value="2">Wstecznej Propagacja Błędu - Klasyczna</option>
                            <option value="3">Wstecznej Propagacja Błędu - Momentum</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12"><h4 class="text-center">Wybierz Bramkę Logiczną</h4></div>
                    <div class="col-md-12 ">
                        <div class="form-group col-md-12">
                            <div class="form-inline">
                                <div class="col-md-2 padding_left">  
                                    <div class="checkbox">          
                                        <input class="myClass" id="AND" type="checkbox" data-label="AND">
                                    </div> 
                                    <img class="bordered shadow" id='and' src="/app/assets/img/and.png" alt="And" height="100%" width="100%">
                                </div>
                                <div class="col-md-2  padding_left">  
                                    <div class="checkbox">
                                        <input class="myClass" id="NAND" type="checkbox" data-label="NAND">
                                    </div>
                                    <img class="bordered shadow" id='nand' src="/app/assets/img/nand.png" alt="graph" height="100%" width="100%">
                                </div>
                                <div class="col-md-2  padding_left">  
                                    <div class="checkbox">
                                        <label>
                                            <input class="myClass" id="OR" type="checkbox" data-label="OR">
                                        </label>
                                    </div>
                                    <img class="bordered shadow" id='or' src="/app/assets/img/or.png" alt="graph" height="100%" width="100%">
                                </div>
                                <div class="col-md-2  padding_left">  
                                    <div class="checkbox">
                                        <label>
                                            <input class="myClass" id="XOR" type="checkbox" data-label="XOR">
                                        </label>
                                    </div>
                                    <img class="bordered shadow"  id='xor' src="/app/assets/img/xor.png" alt="graph" height="100%" width="100%">
                                </div>
                                <div class="col-md-2  padding_left">  
                                    <div class="checkbox">
                                        <label>
                                            <input class="myClass" id="NOR" type="checkbox" data-label="NOR">
                                        </label>
                                    </div>
                                    <img class="bordered shadow" id='nor' src="/app/assets/img/nor.png" alt="graph" height="100%" width="100%">
                                </div>
                                <div class="col-md-2  padding_left">  
                                    <div class="checkbox">
                                        <label>
                                            <input class="myClass" id="XNOR" type="checkbox" data-label="XNOR">
                                        </label>
                                    </div>
                                    <img class="bordered shadow" id='xnor' src="/app/assets/img/xnor.png" alt="graph" height="100%" width="100%"> 
                                </div>
                            </div>
                        </div>   
                    </div>
                    <div class="form-group col-md-12"><h4 class="text-center">Parametry uczenia </h4></div>
                    <div class="form-group col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="alfa">Alfa - Współczynnik Momentum</label>
                                <input type="number" step="0.1"s class="form-control" id="alfa" placeholder="Alfa" name='alfa'>
                            </div>
                            <div class="col-md-6">
                                <label for="beta">Beta - Współczynnik Uczenia</label>
                                <input type="number" step="0.1" class="form-control" id="beta" placeholder="Beta" name='beta'>

                            </div>
                        </div>
                    </div>
                    <div class="form-group  col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="epoch">Maksymalna Liczba Epok</label>
                                <input  type="number" step="100" class="form-control" id="epoch" placeholder="Liczba epok" name='epoch'>
                            </div>
                            <div class="col-md-6">
                                <label for="thresh">Próg Dokładności Uczenia</label>
                                <input type="number" step="0.001" class="form-control" id="thresh" placeholder="Próg" name='thresh'>
                            </div>
                        </div>
                    </div>
                    <div class="form-group  col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="neuronHidden">Liczba Neuronów w Warstwie Ukrytej</label>
                                <input type="number" min="1"  class="form-control" id="neuronHidden" placeholder="Liczba neuronów" name='neuronHidden'>
                            </div>
                            <div class="col-md-6">
                                <label for="sample">Wyświetaj Co ile Epok</label>
                                <input type="number" step="10" class="form-control" id="sample" placeholder="Co ile epok" name='sample'>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group col-md-12"> <h4 class="text-center">Model Sztucznej Sieci Neuronowej</h4></div> 
                    <img class="arch" src="/app/assets/img/zajefajne.svg" alt="graph" height="100%" width="100%"> 
                    <div class="number"></div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-7 col-md-offset-5">
                        <button id='submitajaxform' type="submit" class="btn btn-lg btn-primary"><strong>Naucz Sieć !</strong></button>
                    </div>
                </div>
            </div>
        </div>
            
            <div class="row margin20">  
                <div class="col-md-12">
                    <h2 class="text-center">Rezultaty Eksperymentu</h2>
                    <div class="col-md-6">
                        <div class="col-md-12  bordered shadow white">
                            <div class="col-md-5 "> 
                                <div class="col-md-12"><h4 class='margin12 text-center'>Wektor Uczący</h4></div>
                                <table class='table table-hover table-bordered'>

                                    <thead>
                                        <tr>
                                            <th class="col-md-1 text-center">A</th>
                                            <th class="col-md-1 text-center">B</th>
                                            <th class="col-md-1 text-center">C</th>
                                        </tr> 
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-md-1">

                                                <input type="text" readonly class="form-control text-center" id="test11" name="arr[0][0]">

                                            </td>
                                            <td class="col-md-1">

                                                <input type="text" readonly class="form-control text-center" id="test12" name='arr[0][1]'>

                                            </td>
                                            <td class="col-md-1">

                                                <input type="text" readonly class="form-control text-center" id="test13" name='arr[0][2]'>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-1">

                                                <input type="text" readonly class="form-control text-center" id="test21" name='arr[1][0]'>

                                            </td>
                                            <td class="col-md-1">

                                                <input type="text" readonly class="form-control text-center" id="test22" name='arr[1][1]'>

                                            </td>
                                            <td class="col-md-1">

                                                <input type="text" readonly class="form-control text-center" id="test23" name='arr[1][2]'>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-1">

                                                <input type="text" readonly class="form-control text-center" id="test31" name='arr[2][0]'>

                                            </td>
                                            <td class="col-md-1">

                                                <input type="text" readonly class="form-control text-center" id="test32" name='arr[2][1]'>

                                            </td>
                                            <td class="col-md-1">

                                                <input type="text" readonly class="form-control text-center" id="test33" name='arr[2][2]'>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-1">

                                                <input type="text" readonly class="form-control text-center" id="test41" name='arr[3][0]'>

                                            </td>
                                            <td class="col-md-1">

                                                <input type="text" readonly class="form-control text-center" id="test42" name='arr[3][1]'>

                                            </td>
                                            <td class="col-md-1">

                                                <input type="text" readonly class="form-control text-center" id="test43" name='arr[3][2]'>

                                            </td>
                                        </tr> 
                                </table>
                            </div>

                            <div class="col-md-7">  
                                <div class="col-md-12"><h4 class='margin12 text-center'>Odpowiedzi Sieci</h4></div>
                                <table id="response" class='col-md-12 table table-hover table-bordered table-striped '>
                                    <thead>
                                        <tr>
                                            <th class="col-md-2 text-center">A</th>
                                            <th class="col-md-2 text-center">B</th>
                                            <th class="col-md-5 text-center">Odpowiedź Sieci</th>
                                        </tr> 
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="col-md-2">

                                                <input type="text" readonly class="form-control text-center" id="test11" name='tarr[0][0]'>

                                            </td>
                                            <td class="col-md-2">

                                                <input type="text" readonly class="form-control text-center" id="test12" name='tarr[0][1]'>

                                            </td>
                                            <td class="col-md-5">

                                                <input type="text" readonly class="form-control text-center" id="output1">

                                            </td>
                                        </tr>           
                                        <tr>
                                            <td class="col-md-2">

                                                <input type="text" readonly class="form-control text-center" id="test21" name='tarr[1][0]'>

                                            </td>
                                            <td class="col-md-2">

                                                <input type="text" readonly class="form-control text-center" id="test22" name='tarr[1][1]'>

                                            </td>
                                            <td class="col-md-5">

                                                <input type="text" readonly class="form-control text-center" id="output2">

                                            </td>
                                        </tr>           
                                        <tr>
                                            <td class="col-md-2">

                                                <input type="text" readonly class="form-control text-center" id="test31" name='tarr[2][0]'>

                                            </td>
                                            <td class="col-md-2">

                                                <input type="text" readonly class="form-control text-center" id="test32" name='tarr[2][1]'>

                                            </td>
                                            <td class="col-md-5">

                                                <input type="text" readonly class="form-control text-center" id="output3">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-2">

                                                <input type="text" readonly class="form-control text-center" id="test41" name='tarr[3][0]'>

                                            </td>
                                            <td class="col-md-2">

                                                <input type="text" readonly class="form-control text-center" id="test42" name='tarr[3][1]'>

                                            </td>
                                            <td class="col-md-5">

                                                <input type="text" readonly class="form-control text-center" id="output4">

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>             
                            </div> 
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="col-md-12 bordered shadow white">
                            <div class="col-md-12"><h4 class="text-center">Błąd w Trakcie Uczenia</h4></div> 
                            <div class="col-md-12" id="placeholder">
                                <img class="graph" src="/app/assets/img/graph.png" alt="graph" height="100" width="100"> 
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-12" id='epochnumber'></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </form>    
    
    <div class="placeholder row">
        
    </div> 


   <?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['footertpl']->value;?>
<?php $_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ($_tmp2, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
