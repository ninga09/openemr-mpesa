<?php /* Smarty version 2.6.31, created on 2024-11-03 14:29:39
         compiled from C:/xampp/htdocs/openemr/templates/insurance_companies/general_list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'xl', 'C:/xampp/htdocs/openemr/templates/insurance_companies/general_list.html', 3, false),array('modifier', 'escape', 'C:/xampp/htdocs/openemr/templates/insurance_companies/general_list.html', 3, false),array('modifier', 'upper', 'C:/xampp/htdocs/openemr/templates/insurance_companies/general_list.html', 22, false),)), $this); ?>
<a href="controller.php?practice_settings&<?php echo $this->_tpl_vars['TOP_ACTION']; ?>
insurance_company&action=edit" onclick="top.restoreSession()"
   class="btn btn-default btn-add">
    <?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Add a Company')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</a>
    <br><br>
<table class="table table-responsive table-striped">
    <thead>
        <tr>
            <th><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Name')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</th>
            <th><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='City, State')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</th>
            <th><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Default X12 Partner')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</th>
            <th><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Deactivated')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</th>
        </tr>
    </thead>
    <tbody>
        <?php $_from = $this->_tpl_vars['icompanies']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['insurancecompany']):
?>
        <tr>
            <td>
                <a href="<?php echo $this->_tpl_vars['CURRENT_ACTION']; ?>
action=edit&id=<?php echo ((is_array($_tmp=$this->_tpl_vars['insurancecompany']->id)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
" onclick="top.restoreSession()">
                    <?php echo ((is_array($_tmp=$this->_tpl_vars['insurancecompany']->name)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>

                </a>
            </td>
            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['insurancecompany']->address->city)) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
 <?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['insurancecompany']->address->state)) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)))) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
&nbsp;</td>
            <td><?php echo ((is_array($_tmp=$this->_tpl_vars['insurancecompany']->get_x12_default_partner_name())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
&nbsp;</td>
            <td><?php if ($this->_tpl_vars['insurancecompany']->get_inactive() == 1): ?><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='Yes')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
<?php endif; ?>&nbsp;</td>
        </tr>
        <?php endforeach; else: ?>
        <tr>
            <td colspan="4"><?php echo smarty_function_xl(array('t' => ((is_array($_tmp='No Insurance Companies Found')) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html'))), $this);?>
</td>
        </tr>
        <?php endif; unset($_from); ?>
    </tbody>
</table>