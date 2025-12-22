<?php /* Smarty version 2.6.31, created on 2024-11-03 14:28:28
         compiled from C:/xampp/htdocs/openemr/templates/pharmacies/general_edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'C:/xampp/htdocs/openemr/templates/pharmacies/general_edit.html', 13, false),array('function', 'xl', 'C:/xampp/htdocs/openemr/templates/pharmacies/general_edit.html', 15, false),array('function', 'html_options', 'C:/xampp/htdocs/openemr/templates/pharmacies/general_edit.html', 85, false),)), $this); ?>
<form name="pharmacy" method="post" action="<?php echo $this->_tpl_vars['FORM_ACTION']; ?>
"  class='form-horizontal' onsubmit="return top.restoreSession()">
<!-- it is important that the hidden form_id field be listed first, when it is called is populates any old information attached with the id, this allows for partial edits
        if it were called last, the settings from the form would be overwritten with the old information-->
    <input type="hidden" name="form_id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pharmacy']->id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
    <div class="form-group">
        <label for="name" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Name')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="name" name="name" class="form-control" aria-describedby="nameHelpBox" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pharmacy']->name)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
            <span id="nameHelpBox" class="help-block">(<?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Required')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
)</span>
        </div>
    </div>
    <div class="form-group">
        <label for="address_line1" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Address')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="address_line1" name="address_line1" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pharmacy']->address->line1)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="address_line2" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Address')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="address_line2" name="address_line2" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pharmacy']->address->line2)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="city" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='City')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="city" name="city" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pharmacy']->address->city)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="state" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='State')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" maxlength="2" id="state" name="state" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pharmacy']->address->state)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="city" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Zip Code')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="zip" name="zip" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pharmacy']->address->zip)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Email')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="email" name="email" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pharmacy']->email)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="phone" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Phone')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="phone" name="phone" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pharmacy']->get_phone())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="fax" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Fax')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="fax" name="fax" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pharmacy']->get_fax())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="npi" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='NPI')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="npi" name="npi" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pharmacy']->get_npi())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="ncpdp" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='NCPDP')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="ncpdp" name="ncpdp" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pharmacy']->get_ncpdp())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="transmit_method" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Default Method')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <select id="transmit_method" name="transmit_method" class="form-control">
                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['pharmacy']->transmit_method_array,'selected' => $this->_tpl_vars['pharmacy']->transmit_method), $this);?>

            </select>
        </div>
    </div>
    <div class="btn-group col-sm-offset-2">
        <a href="javascript:submit_pharmacy();" class="btn btn-default btn-save" onclick="top.restoreSession()">
            <?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Save')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>

        </a>
        <a href="controller.php?practice_settings&pharmacy&action=list" class="btn btn-link btn-cancel" onclick="top.restoreSession()">
            <?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Cancel')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>

        </a>
    </div>
    <input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['pharmacy']->id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
">
    <input type="hidden" name="process" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['PROCESS'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
">
</form>

<?php echo '
<script language="javascript">
function submit_pharmacy()
{
    if(document.pharmacy.name.value.length>0)
    {
        top.restoreSession();
        document.pharmacy.submit();
        //Z&H Removed redirection
    }
    else
    {
        document.pharmacy.name.style.backgroundColor="red";
        document.pharmacy.name.focus();
    }
}

 function Waittoredirect(delaymsec) {
     var st = new Date();
     var et = null;
     do {
     et = new Date();
     } while ((et - st) < delaymsec);
 }
</script>
'; ?>
