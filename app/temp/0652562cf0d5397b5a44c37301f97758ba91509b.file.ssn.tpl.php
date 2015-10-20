<?php /* Smarty version Smarty-3.1.21-dev, created on 2014-12-10 22:40:02
         compiled from "/var/www/html/app/app/templates/ssn/ssn.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1942918886547074976ef003-02851640%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0652562cf0d5397b5a44c37301f97758ba91509b' => 
    array (
      0 => '/var/www/html/app/app/templates/ssn/ssn.tpl',
      1 => 1418247536,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1942918886547074976ef003-02851640',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54707497730424_37429589',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54707497730424_37429589')) {function content_54707497730424_37429589($_smarty_tpl) {?>
<?php echo $_smarty_tpl->getSubTemplate ('/var/www/html/app/app/templates/home/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


<div class="container">
    <form id='ajaxform'  method="POST" action="app.php?page=ssn&action=ssn" class="form" role="form">

        <div class="row">    
            <div class="col-md-3">
                <table class='table'>

                    <tbody>
                        <tr>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test11" name="arr[0][0]">
                                </div>
                            </td>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test12" name='arr[0][1]'>
                                </div>
                            </td>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test13" name='arr[0][2]'>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test21" name='arr[1][0]'>
                                </div>
                            </td>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test22" name='arr[1][1]'>
                                </div>
                            </td>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test23" name='arr[1][2]'>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test31" name='arr[2][0]'>
                                </div>
                            </td>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test32" name='arr[2][1]'>
                                </div>
                            </td>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test33" name='arr[2][2]'>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test41" name='arr[3][0]'>
                                </div>
                            </td>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test42" name='arr[3][1]'>
                                </div>
                            </td>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test43" name='arr[3][2]'>
                                </div>
                            </td>
                        </tr> 
                </table>

            </div>

            <div class="col-md-4">

                <table id="response" class='table'>
                    <tbody>
                        <tr>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test11" name='tarr[0][0]'>
                                </div>
                            </td>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test12" name='tarr[0][1]'>
                                </div>
                            </td>
                            <td class="col-md-5">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="output1">
                                </div>
                            </td>
                        </tr>           
                        <tr>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test21" name='tarr[1][0]'>
                                </div>
                            </td>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test22" name='tarr[1][1]'>
                                </div>
                            </td>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="output2">
                                </div>
                            </td>
                        </tr>           
                        <tr>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test31" name='tarr[2][0]'>
                                </div>
                            </td>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test32" name='tarr[2][1]'>
                                </div>
                            </td>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="output3">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test41" name='tarr[3][0]'>
                                </div>
                            </td>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="test42" name='tarr[3][1]'>
                                </div>
                            </td>
                            <td class="col-md-1">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="output4">
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>             
            </div>

            <div class="col-md-5">

                <div class="form-group col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="alfa">Alfa</label>
                            <input type="text" minlength=”4” size="20" class="required form-control" id="alfa" placeholder="alfa" name='alfa'>
                        </div>
                        <div class="col-md-6">
                            <label for="beta">Beta</label>
                            <input type="text" class="form-control" id="beta" placeholder="beta" name='beta'>

                        </div>
                    </div>
                </div>
                <div class="form-group  col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="epoch">Epoch</label>
                            <input type="text" class="form-control" id="epoch" placeholder="epoch" name='epoch'>
                        </div>
                        <div class="col-md-6">
                            <label for="thresh">Threshold</label>
                            <input type="text" class="form-control" id="thresh" placeholder="thresh" name='thresh'>
                        </div>
                    </div>
                </div>
                <div class="form-group  col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="neuronHidden">Neuron</label>
                            <input type="text" class="form-control" id="neuronHidden" placeholder="Neuron number" name='neuronHidden'>
                        </div>
                        <div class="col-md-6">
                            <label for="sample">Sample</label>
                            <input type="text" class="form-control" id="sample" placeholder="sample" name='sample'>
                        </div>
                    </div>
                </div>
                </form>    
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group  col-md-12">
                    <form class="form-inline" role="form">
                        <div class="checkbox">          
                            <input class="myClass" id="AND" type="checkbox" data-label="AND">
                        </div> 
                        <div class="checkbox">
                            <input class="myClass" id="NAND" type="checkbox" data-label="NAND">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input class="myClass" id="OR" type="checkbox" data-label="OR">
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input class="myClass" id="XOR" type="checkbox" data-label="XOR">
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input class="myClass" id="NOR" type="checkbox" data-label="NOR">
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input class="myClass" id="XNOR" type="checkbox" data-label="XNOR">
                            </label>
                        </div>
                    </form>
                </div>   
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-7 col-md-offset-5">
                    <button id='submitajaxform' type="submit" class="btn btn-lg btn-primary">Perform</button>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div id="placeholder">
                    <img src="smiley.gif" alt="Smiley face" height="42" width="42"> 
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-8 col-md-offset-2"><h3>Przed Procesem Uczenia</h3></div>
                <table id="firstweight" class="table table-hover table-bordered table-striped table-condensed col-md-12">
                    <tr>
                        <th>Wagi Warstwy Ukrytej</th><th>Wagi Warstwy Wyściowej</th>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <div class="col-md-12 col-md-offset-2"><h3>Po Procesie Uczenia</h3></div>
                <table id="finalweight" class="table table-hover table-bordered table-striped table-condensed col-md-12">
                    <tr>
                        <th>Wagi Warstwy Ukrytej</th><th>Wagi Warstwy Wyściowej</th>
                    </tr>
                </table>
            </div>
        </div> 
</div>

<?php echo $_smarty_tpl->getSubTemplate ('/var/www/html/app/app/templates/home/head.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
