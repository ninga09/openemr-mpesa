<?php /* Smarty version 2.6.31, created on 2024-11-03 14:29:41
         compiled from C:/xampp/htdocs/openemr/templates/insurance_numbers/general_list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'xl', 'C:/xampp/htdocs/openemr/templates/insurance_numbers/general_list.html', 4, false),array('modifier', 'escape', 'C:/xampp/htdocs/openemr/templates/insurance_numbers/general_list.html', 4, false),)), $this); ?>
<table class="table table-responsive table-striped">
    <thead>
    <tr>
        <th><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Name')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</th>
        <th>&nbsp;</th>
        <th><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Provider')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
 #</th>
        <th><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Rendering')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
 #</th>
        <th><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Group')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
 #</th>
    </tr>
    </thead>
    <tbody>
    <?php $_from = $this->_tpl_vars['providers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['provider']):
?>
    <tr>
        <td>
            <a href="<?php echo $this->_tpl_vars['CURRENT_ACTION']; ?>
action=edit&id=default&provider_id=<?php echo ((is_array($_tmp=$this->_tpl_vars['provider']->id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onclick="top.restoreSession()">
                <?php echo ((is_array($_tmp=$this->_tpl_vars['provider']->get_name_display())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>

            </a>
        </td>
        <td><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Default')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
&nbsp;</td>
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['provider']->get_provider_number_default())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
&nbsp;</td>
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['provider']->get_rendering_provider_number_default())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
&nbsp;</td>
        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['provider']->get_group_number_default())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
&nbsp;</td>
    </tr>
    <?php endforeach; else: ?>
    <tr>
        <td><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='No Providers Found')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</td>
    </tr>
    <?php endif; unset($_from); ?>
    </tbody>
</table>
