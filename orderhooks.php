<?php

class OrderHooks extends Module
{
    public function __construct()
    {
        $this->name = 'orderhooks';
        $this->version = '1.0.0';
        $this->need_instance = 1;

        parent::__construct();

        $this->displayName = 'Order hooks';
    }

    public function install()
    {
        return parent::install() &&
            $this->registerHook('displayBackOfficeOrderActions') &&

            $this->registerHook('displayAdminOrderContentOrder') &&
            $this->registerHook('displayAdminOrderTabOrder') &&

            $this->registerHook('displayAdminOrderTabShip') &&
            $this->registerHook('displayAdminOrderContentShip') &&

            $this->registerHook('displayAdminOrderRight') &&
            $this->registerHook('displayAdminOrderLeft') &&
            $this->registerHook('displayAdminOrder')
        ;
    }

    public function hookDisplayBackOfficeOrderActions(array $params)
    {
        $this->context->smarty->assign([
            'order_id' => $params['id_order'],
        ]);

        return $this->context->smarty->fetch($this->getLocalPath().'views/templates/displayBackOfficeOrderActions.tpl');
    }

    public function hookDisplayAdminOrder(array $params)
    {
        $this->context->smarty->assign([
            'order_id' => $params['id_order'],
        ]);

        return $this->context->smarty->fetch($this->getLocalPath().'views/templates/displayAdminOrder.tpl');
    }

    public function hookDisplayAdminOrderLeft(array $params)
    {
        $this->context->smarty->assign([
            'order_id' => $params['id_order'],
        ]);

        return $this->context->smarty->fetch($this->getLocalPath().'views/templates/displayAdminOrderLeft.tpl');
    }

    public function hookDisplayAdminOrderRight(array $params)
    {
        $this->context->smarty->assign([
            'order_id' => $params['id_order'],
        ]);

        return $this->context->smarty->fetch($this->getLocalPath().'views/templates/displayAdminOrderRight.tpl');
    }

    public function hookDisplayAdminOrderTabShip(array $params)
    {
        $this->context->smarty->assign([
            'order_id' => $params['id_order'],
        ]);

        return $this->context->smarty->fetch($this->getLocalPath().'views/templates/displayAdminOrderTabShip.tpl');
    }

    public function hookDisplayAdminOrderContentShip(array $params)
    {
        return $this->context->smarty->fetch($this->getLocalPath().'views/templates/displayAdminOrderContentShip.tpl');
    }

    public function hookDisplayAdminOrderTabOrder(array $params)
    {
        $this->context->smarty->assign([
            'order_id' => $params['id_order'],
        ]);

        return $this->context->smarty->fetch($this->getLocalPath().'views/templates/displayAdminOrderTabOrder.tpl');
    }

    public function hookDisplayAdminOrderContentOrder(array $params)
    {
        return $this->context->smarty->fetch($this->getLocalPath().'views/templates/displayAdminOrderContentOrder.tpl');
    }
}
