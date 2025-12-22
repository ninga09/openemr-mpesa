<?php /* Smarty version 2.6.31, created on 2024-11-03 14:29:44
         compiled from C:/xampp/htdocs/openemr/templates/x12_partners/general_list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'xl', 'C:/xampp/htdocs/openemr/templates/x12_partners/general_list.html', 2, false),array('modifier', 'escape', 'C:/xampp/htdocs/openemr/templates/x12_partners/general_list.html', 2, false),)), $this); ?>
<a href="<?php echo $this->_tpl_vars['CURRENT_ACTION']; ?>
action=edit&id=default" onclick="top.restoreSession()" class="btn btn-default btn-add">
    <?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Add New Partner')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>

</a>
<br><br>
<table class="table table-responsive table-striped">
    <thead>
    <tr>
        <th><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Name')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</th>
        <th><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Sender ID')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</th>
        <th><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Receiver ID')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</th>
        <th><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Version')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</th>
    </tr>
    </thead>
    <?php $_from = $this->_tpl_vars['partners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['partner']):
?>
    <tr>
        <td>
            <a href="<?php echo $this->_tpl_vars['CURRENT_ACTION']; ?>
action=edit&x12_partner_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['partner']->id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onclick="top.restoreSession()">
                <?php echo ((is_array($_tmp=$this->_tpl_vars['partner']->get_name())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
&nbsp;
            </a>
        </td>
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['partner']->get_x12_sender_id())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
&nbsp;</td>
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['partner']->get_x12_receiver_id())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
&nbsp;</td>
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['partner']->get_x12_version())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
&nbsp;</td>
    </tr>
    <?php endforeach; else: ?>
    <tr>
        <td colspan="4"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='No Partners Found')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</td>
    </tr>
    <?php endif; unset($_from); ?>
</table>