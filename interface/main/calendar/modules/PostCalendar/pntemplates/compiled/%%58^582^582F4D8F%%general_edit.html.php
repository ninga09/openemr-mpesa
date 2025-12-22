<?php /* Smarty version 2.6.31, created on 2024-11-03 14:29:48
         compiled from C:/xampp/htdocs/openemr/templates/x12_partners/general_edit.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'xl', 'C:/xampp/htdocs/openemr/templates/x12_partners/general_edit.html', 12, false),array('function', 'html_options', 'C:/xampp/htdocs/openemr/templates/x12_partners/general_edit.html', 51, false),array('modifier', 'escape', 'C:/xampp/htdocs/openemr/templates/x12_partners/general_edit.html', 12, false),)), $this); ?>
<form name="x12_partner" method="post" action="<?php echo $this->_tpl_vars['FORM_ACTION']; ?>
" class='form-horizontal' onsubmit="return top.restoreSession()">
    <div class="form-group">
        <label for="name" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Partner Name')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="name" name="name" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['partner']->get_name())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="id_number" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='ID Number (ETIN)')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="id_number" name="id_number" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['partner']->get_id_number())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="x12_isa01" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='User logon Required Indicator (ISA01~ use 00 or 03)')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="x12_isa01" name="x12_isa01" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['partner']->get_x12_isa01())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="x12_isa02" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='User Logon (If 03 above, else leave spaces) (ISA02)')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="x12_isa02" name="x12_isa02" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['partner']->get_x12_isa02())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="x12_isa03" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='User password required Indicator (ISA03~ use 00 or 01)')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="x12_isa03" name="x12_isa03" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['partner']->get_x12_isa03())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="x12_isa04" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='User Password (ISA04~ if 01 above, else leave spaces)')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="x12_isa04" name="x12_isa04" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['partner']->get_x12_isa04())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="x12_isa05" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Sender ID Qualifier (ISA05)')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <select id="x12_isa05" name="x12_isa05" class="form-control">
                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['partner']->get_idqual_array(),'selected' => $this->_tpl_vars['partner']->get_x12_isa05()), $this);?>

            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="x12_sender_id" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Sender ID (ISA06)')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="x12_sender_id" name="x12_sender_id" class="form-control"  value="<?php echo ((is_array($_tmp=$this->_tpl_vars['partner']->get_x12_sender_id())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="x12_isa07" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Receiver ID Qualifier (ISA07)')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <select id="x12_isa07" name="x12_isa07" class="form-control">
                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['partner']->get_idqual_array(),'selected' => $this->_tpl_vars['partner']->get_x12_isa07()), $this);?>

            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="x12_receiver_id" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Receiver ID (ISA08)')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="x12_receiver_id" name="x12_receiver_id" class="form-control" value="<?php echo $this->_tpl_vars['partner']->get_x12_receiver_id(); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="x12_isa14" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Acknowledgment Requested (ISA14)')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <select id="x12_isa14" name="x12_isa14" class="form-control">
                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['partner']->get_x12_isa14_array(),'selected' => $this->_tpl_vars['partner']->get_x12_isa14()), $this);?>

            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="x12_isa15" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Usage Indicator (ISA15)')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <select id="x12_isa15" name="x12_isa15" class="form-control">
                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['partner']->get_x12_isa15_array(),'selected' => $this->_tpl_vars['partner']->get_x12_isa15()), $this);?>

            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="x12_gs02" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Application Sender Code (GS02)')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="x12_gs02" name="x12_gs02" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['partner']->get_x12_gs02())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="12_per06" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Submitter EDI Access Number (PER06)')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" id="12_per06" name="x12_per06" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['partner']->get_x12_per06())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="form-group">
        <label for="x12_version" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Version')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <select id="x12_version" name="x12_version" class="form-control">
                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['partner']->get_x12_version_array(),'selected' => $this->_tpl_vars['partner']->get_x12_version()), $this);?>

            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="processing_format" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Processing format')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <select id="x12_isa07" id="processing_format" name="processing_format" class="form-control">
                <?php echo smarty_function_html_options(array('options' => $this->_tpl_vars['partner']->get_processing_format_array(),'selected' => $this->_tpl_vars['partner']->get_processing_format()), $this);?>

            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="x12_gs03" class="control-label col-sm-2"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Application Receiver Code (GS03 - If blank ISA08 will be used)')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</label>
        <div class="col-sm-8">
            <input type="text" maxlength="15" id="x12_gs03" name="x12_gs03" class="form-control" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['partner']->get_x12_gs03())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onKeyDown="PreventIt(event)">
        </div>
    </div>
    <div class="btn-group col-sm-offset-2">
        <a href="javascript:add_x12();" class="btn btn-default btn-save" onclick="top.restoreSession()">
            <?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Save')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>

        </a>
        <a href="controller.php?practice_settings&x12_partner&action=list"  class="btn btn-link btn-cancel" onclick="top.restoreSession()">
            <?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Cancel')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>

        </a>
    </div>
    <input type="hidden" name="id" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['partner']->id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
    <input type="hidden" name="process" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['PROCESS'])) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" />
    <input type="hidden" name="sub" value="no" />
</form>

<?php echo '
<script language="javascript">
function add_x12()
{
if (document.x12_partner.name.value.length>0)
{
top.restoreSession();
document.x12_partner.submit();
}
else
{
document.x12_partner.name.style.backgroundColor="red";
document.x12_partner.name.focus();
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