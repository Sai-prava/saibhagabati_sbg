<div class="logo_Section_main_sidebar">
    <a href="<?php echo e(route('home')); ?>" class="logo-wrapper">
        <?php
            $photo = isset($whiteLabelInfo->mini_logo)
                ? 'uploads/white_label/' . $whiteLabelInfo->mini_logo
                : 'frequent_changing/images/mini_logo.png';
            
            $logo_lg = isset($whiteLabelInfo->logo)
                ? 'uploads/white_label/' . $whiteLabelInfo->logo
                : 'frequent_changing/images/logo.png';
        ?>

        <span class="logo-lg">
            <img src="<?php echo e($baseURL . $logo_lg); ?>" class="img-circle" alt="Logo Image">
        </span>
        <span class="logo-mini">
            <img src="<?php echo e($baseURL . $photo); ?>" class="img-circle" alt="Logo Image">
        </span>
    </a>
    <a href="#" class="sidebar-toggle set_collapse" data-status="2" data-toggle="push-menu" role="button"
        style="transform: rotate(0deg); transition: 0.7s;">
        <iconify-icon icon="solar:round-alt-arrow-left-broken" width="25"></iconify-icon>
    </a>
</div>
<!-- Admin Logo Part End -->
<section class="sidebar">

    <div id="left_menu_to_scroll">
        <ul class="sidebar-menu ps ps--active-x ps--active-y tree" data-widget="tree">

            <li class="parent-menu treeview2 menu_assign_class menu__cidirp_1<?php echo e(request()->is('home') ? ' menu-open active_sub_menu' : ''); ?>"
                data-menu__cid="irp_1">
                <a href="<?php echo e(route('home')); ?>">
                    <iconify-icon icon="solar:home-broken"></iconify-icon>
                    <span class="match_bold"><?php echo app('translator')->get('index.home'); ?></span>
                </a>
            </li>
            <?php if(menuPermission('Dashboard')): ?>
                <li class="parent-menu treeview2 menu_assign_class menu__cidirp_1<?php echo e(request()->is('dashboard') ? ' menu-open active_sub_menu' : ''); ?>"
                    data-menu__cid="irp_1">
                    <a href="<?php echo e(route('dashboard')); ?>">
                        <iconify-icon icon="solar:chart-2-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.dashboard'); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('liveLocation')): ?>
                <li class="parent-menu treeview2 menu_assign_class menu__cidirp_1<?php echo e(request()->is('liveLocation') ? ' menu-open active_sub_menu' : ''); ?>"
                    data-menu__cid="irp_1">
                    <a href="<?php echo e(route('liveLocation')); ?>">
                        <iconify-icon icon="material-symbols:location-on-outline"></iconify-icon>
                        <span class="match_bold">LiveLocation</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Timeline')): ?>
                <li class="parent-menu treeview2 menu_assign_class menu__cidirp_1<?php echo e(request()->is('timeLine') ? ' menu-open active_sub_menu' : ''); ?>"
                    data-menu__cid="irp_1">
                    <a href="<?php echo e(route('timeLine')); ?>">
                        <iconify-icon icon="material-symbols:timeline"></iconify-icon>
                        <span class="match_bold">TimeLine</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('CardView')): ?>
                <li class="parent-menu treeview2 menu_assign_class menu__cidirp_1<?php echo e(request()->is('cardView') ? ' menu-open active_sub_menu' : ''); ?>"
                    data-menu__cid="irp_1">
                    <a href="<?php echo e(route('cardView')); ?>">
                        <iconify-icon icon="material-symbols:calendar-today-outline"></iconify-icon>
                        <span class="match_bold">CardView</span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Manufacture')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('productions*') || request()->is('production-loss*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:chart-square-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.manufacture'); ?></span>
                    </a>                    
                    <ul class="treeview-menu">
                        <?php if(routePermission('manufacture.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('productions.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('productions.create')); ?>"><?php echo app('translator')->get('index.add_manufacture'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('manufacture.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('productions.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('productions.index')); ?>"><?php echo app('translator')->get('index.manufacture_list'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('production-loss.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('production-loss') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('production-loss')); ?>"><?php echo app('translator')->get('index.add_production_loss'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('production-loss.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('production-loss-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('production-loss-report')); ?>"><?php echo app('translator')->get('index.production_loss_list'); ?></a>
                            </li>
                        <?php endif; ?>                       
                        <?php if(routePermission('production-loss.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('forecasting.order') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('forecasting.order')); ?>"><?php echo app('translator')->get('index.demand_forecasting_by_order'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('production-loss.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('forecasting.product') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('forecasting.product')); ?>"><?php echo app('translator')->get('index.demand_forecasting_by_product'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Product Stock')): ?>
                <li class="parent-menu treeview2 menu_assign_class menu__cidirp_1<?php echo e(request()->is('product-stock*') ? ' menu-open active_sub_menu' : ''); ?>"
                    data-menu__cid="irp_1">
                    <a href="<?php echo e(route('product-stock')); ?>">
                        <iconify-icon icon="solar:bag-2-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.product_stocks'); ?></span>
                    </a>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Orders')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('customer-orders*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:user-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.orders'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">
                        
                        <?php if(routePermission('order.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('customer-orders.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('customer-orders.create')); ?>"><?php echo app('translator')->get('index.add_order'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('order.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('customer-orders.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('customer-orders.index')); ?>"><?php echo app('translator')->get('index.order_list'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('order-status')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('customer-order-status') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('customer-order-status')); ?>"><?php echo app('translator')->get('index.order_status'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Sales')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('sales*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:cart-large-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.sale'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">
                        
                        <?php if(routePermission('sale.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('sales.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('sales.create')); ?>"><?php echo app('translator')->get('index.add_sale'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('sale.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('sales.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('sales.index')); ?>"><?php echo app('translator')->get('index.sale_list'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Purchase')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('rawmaterialpurchases*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:cart-check-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.purchase'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">                        
                        <?php if(routePermission('purchase.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('rawmaterialpurchases.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('rawmaterialpurchases.create')); ?>"><?php echo app('translator')->get('index.add_purchase'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('purchase.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('rawmaterialpurchases.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('rawmaterialpurchases.index')); ?>"><?php echo app('translator')->get('index.list_purchase'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Parties')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('suppliers*') || request()->is('customers*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:users-group-two-rounded-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.parties'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">                        
                        <?php if(routePermission('customer.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('customers.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('customers.create')); ?>"><?php echo app('translator')->get('index.add_customer'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('customer.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('customers.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('customers.index')); ?>"><?php echo app('translator')->get('index.list_customer'); ?></a>
                            </li>
                        <?php endif; ?>                        
                        <?php if(routePermission('supplier.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('suppliers.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('suppliers.create')); ?>"><?php echo app('translator')->get('index.add_supplier'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('supplier.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('suppliers.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('suppliers.index')); ?>"><?php echo app('translator')->get('index.list_supplier'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('RM Stock')): ?>
                <li class="parent-menu treeview menu_assign_class menu__cidirp_1<?php echo e(request()->is('getRMStock*') || request()->is('getLowStock*') || request()->is('stock-adjustment*') ? ' menu-open active_sub_menu' : ''); ?>"
                    data-menu__cid="irp_1">
                    <a href="#">
                        <iconify-icon icon="solar:database-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.rm_stocks'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">                        
                        <?php if(routePermission('rm.stock')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('getRMStock') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('getRMStock')); ?>"><?php echo app('translator')->get('index.rm_stocks'); ?></a>
                            </li>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('getLowStock') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('getLowStock')); ?>"><?php echo app('translator')->get('index.low_stock'); ?></a>
                            </li>
                        <?php endif; ?>                        
                        <?php if(routePermission('stock-adjustment.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('stockAdjust') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('stockAdjust')); ?>"><?php echo app('translator')->get('index.add_stock_adjustment'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('stock-adjustment.list')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('stockAdjustList') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('stockAdjustList')); ?>"><?php echo app('translator')->get('index.stock_adjustment_list'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Attendance')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('attendance*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:stopwatch-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.attendance'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">                        
                        <?php if(routePermission('attendance.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('attendance.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('attendance.create')); ?>"><?php echo app('translator')->get('index.add_attendance'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('attendance.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('attendance.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('attendance.index')); ?>"><?php echo app('translator')->get('index.attendance_list'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Expenses')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('expense') || request()->is('expense/*') || request()->is('expense-category*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:money-bag-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.expense'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">                        
                        <?php if(routePermission('expense.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('expense.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('expense.create')); ?>"><?php echo app('translator')->get('index.add_expense'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('expense.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('expense.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('expense.index')); ?>"><?php echo app('translator')->get('index.expense_list'); ?></a>
                            </li>
                        <?php endif; ?>                        
                        <?php if(routePermission('expensecategory.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('expense-category.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('expense-category.create')); ?>"><?php echo app('translator')->get('index.add_expense_category'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('expensecategory.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('expense-category.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('expense-category.index')); ?>"><?php echo app('translator')->get('index.expense_category_list'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Accounting')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('accounts*') || request()->is('deposit*') || request()->is('balance-sheet*') || request()->is('trial-balance*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:wallet-money-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.accounting'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">                        
                        <?php if(routePermission('account.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('accounts.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('accounts.create')); ?>"><?php echo app('translator')->get('index.add_account'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('account.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('accounts.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('accounts.index')); ?>"><?php echo app('translator')->get('index.list_account'); ?></a>
                            </li>
                        <?php endif; ?>                        
                        <?php if(routePermission('deposit.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('deposit.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('deposit.create')); ?>"><?php echo app('translator')->get('index.add_deposit_or_withdraw'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('deposit.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('deposit.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('deposit.index')); ?>"><?php echo app('translator')->get('index.list_deposit_or_withdraw'); ?></a>
                            </li>
                        <?php endif; ?>                        
                        <?php if(routePermission('balancesheet')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('balance-sheet') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('balance-sheet')); ?>"><?php echo app('translator')->get('index.balance_sheet'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('trialbalance')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('trial-balance') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('trial-balance')); ?>"><?php echo app('translator')->get('index.trial_balance'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Supplier Payment')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('supplier-payment*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:card-send-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.supplier_payment'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">                        
                        <?php if(routePermission('sp.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('supplier-payment.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('supplier-payment.create')); ?>"><?php echo app('translator')->get('index.add_supplier_payment'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('sp.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('supplier-payment.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('supplier-payment.index')); ?>"><?php echo app('translator')->get('index.supplier_payment_list'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Customer Receives')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('customer-payment*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:card-recive-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.customer_receive'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">                        
                        <?php if(routePermission('cd.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('customer-payment.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('customer-payment.create')); ?>"><?php echo app('translator')->get('index.add_customer_receive'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('cd.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('customer-payment.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('customer-payment.index')); ?>"><?php echo app('translator')->get('index.customer_receive_list'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Payroll')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('payroll*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:transmission-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.payroll'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">                        
                        <?php if(routePermission('payroll.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('payroll.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('payroll.create')); ?>"><?php echo app('translator')->get('index.add_payroll'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('payroll.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('payroll.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('payroll.index')); ?>"><?php echo app('translator')->get('index.list_payroll'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Item Setup')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('rmcategories*') || request()->is('rawmaterials*') || request()->is('noninventoryitems*') || request()->is('fpcategories*') || request()->is('finishedproducts*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:inbox-line-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.item_setup'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">                        
                        <?php if(routePermission('rmcategory.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('rmcategories.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('rmcategories.create')); ?>"><?php echo app('translator')->get('index.add_rm_category'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('rmcategory.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('rmcategories.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('rmcategories.index')); ?>"><?php echo app('translator')->get('index.rm_category'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('rm.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('rawmaterials.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('rawmaterials.create')); ?>"><?php echo app('translator')->get('index.add_raw_material'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('rm.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('rawmaterials.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('rawmaterials.index')); ?>"><?php echo app('translator')->get('index.list_raw_material'); ?></a>
                            </li>
                        <?php endif; ?>                        
                        <?php if(routePermission('noi.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('noninventoryitems.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('noninventoryitems.create')); ?>"><?php echo app('translator')->get('index.add_non_inventory_item'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('noi.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('noninventoryitems.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('noninventoryitems.index')); ?>"><?php echo app('translator')->get('index.list_non_inventory_item'); ?></a>
                            </li>
                        <?php endif; ?>                        
                        <?php if(routePermission('productcategory.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('fpcategories.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('fpcategories.create')); ?>"><?php echo app('translator')->get('index.add_product_category'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('productcategory.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('fpcategories.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('fpcategories.index')); ?>"><?php echo app('translator')->get('index.list_product_category'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('product.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('finishedproducts.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('finishedproducts.create')); ?>"><?php echo app('translator')->get('index.add_product'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('product.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('finishedproducts.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('finishedproducts.index')); ?>"><?php echo app('translator')->get('index.list_product'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('RM Wastes')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('rmwastes*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:trash-bin-minimalistic-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.rm_waste'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">                        
                        <?php if(routePermission('rmwaste.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('rmwastes.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('rmwastes.create')); ?>"><?php echo app('translator')->get('index.add_rm_waste'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('rmwaste.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('rmwastes.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('rmwastes.index')); ?>"><?php echo app('translator')->get('index.list_rm_waste'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Product Wastes')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('product-wastes*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:paper-bin-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.product_waste'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">
                        <?php if(routePermission('productwaste.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('product-wastes.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('product-wastes.create')); ?>"><?php echo app('translator')->get('index.add_product_waste'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('productwaste.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('product-wastes.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('product-wastes.index')); ?>"><?php echo app('translator')->get('index.list_product_waste'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Quotations')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('quotation*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:ruler-pen-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.quotions'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">
                        <?php if(routePermission('quotations.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('quotation.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('quotation.create')); ?>"><?php echo app('translator')->get('index.add_quotion'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('quotations.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('quotation.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('quotation.index')); ?>"><?php echo app('translator')->get('index.quotion_list'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Reports')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('rm-purchase-report*') || request()->is('rm-item-purchase-report*') || request()->is('rm-stock-report*') || request()->is('supplier-due-report*') || request()->is('supplier-balance-report*') || request()->is('supplier-ledger*') || request()->is('production-report*') || request()->is('fp-production-report*') || request()->is('fp-sale-report*') || request()->is('fp-item-sale-report*') || request()->is('customer-due-report*') || request()->is('customer-ledger*') || request()->is('profit-loss-report*') || request()->is('product-profit-report*') || request()->is('attendance-report*') || request()->is('expense-report*') || request()->is('salary-report*') || request()->is('rmwaste-report*') || request()->is('fpwaste-report*') || request()->is('rm-price-history') || request()->is('product-price-history') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:diagram-down-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.report'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">
                        
                        <?php if(routePermission('product-price-history')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('product.price.history') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('product.price.history')); ?>"><?php echo app('translator')->get('index.product_price_history'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('rm-price-history')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('price-history') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('price-history')); ?>"><?php echo app('translator')->get('index.rm_price_history'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('rmpurchase.report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('rm-purchase-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('rm-purchase-report')); ?>"><?php echo app('translator')->get('index.rm_purchase_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('rmpurchaseitem.report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('rm-item-purchase-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('rm-item-purchase-report')); ?>"><?php echo app('translator')->get('index.rm_item_purchase_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('rmstock.report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('rm-stock-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('rm-stock-report')); ?>"><?php echo app('translator')->get('index.rm_stock_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('supplierdue.report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('supplier-due-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('supplier-due-report')); ?>"><?php echo app('translator')->get('index.supplier_due_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('supplierdue.report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('supplier-balance-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('supplier-balance-report')); ?>"><?php echo app('translator')->get('index.supplier_balance_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('supplierledger.report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('supplier-ledger') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('supplier-ledger')); ?>"><?php echo app('translator')->get('index.supplier_ledger'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('production.report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('production-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('production-report')); ?>"><?php echo app('translator')->get('index.production_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('fpp.report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('fp-production-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('fp-production-report')); ?>"><?php echo app('translator')->get('index.fp_production_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('fpsale.report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('fp-sale-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('fp-sale-report')); ?>"><?php echo app('translator')->get('index.fp_sale_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('fpitemsale.report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('fp-item-sale-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('fp-item-sale-report')); ?>"><?php echo app('translator')->get('index.fp_item_sale_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('customerdue.report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('customer-due-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('customer-due-report')); ?>"><?php echo app('translator')->get('index.customer_due_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('customerledger')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('customer-ledger') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('customer-ledger')); ?>"><?php echo app('translator')->get('index.customer_ledger'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('profit-loss')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('profit-loss-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('profit-loss-report')); ?>"><?php echo app('translator')->get('index.profit_loss_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('production-profit.report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('product-profit-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('product-profit-report')); ?>"><?php echo app('translator')->get('index.product_profit_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('attandance.report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('attendance-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('attendance-report')); ?>"><?php echo app('translator')->get('index.attendance_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('expense-report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('expense-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('expense-report')); ?>"><?php echo app('translator')->get('index.expense_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('salary-report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('salary-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('salary-report')); ?>"><?php echo app('translator')->get('index.salary_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('rmwaste-report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('rmwaste-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('rmwaste-report')); ?>"><?php echo app('translator')->get('index.rmwaste_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('productwaste-report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('fpwaste-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('fpwaste-report')); ?>"><?php echo app('translator')->get('index.product_waste_report'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('abcanalysis-report')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('abc-analysis-report') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('abc-analysis-report')); ?>"><?php echo app('translator')->get('index.abc_analysis_report'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Users')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('user*') || request()->is('role*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:user-circle-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.user'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">                        
                        <?php if(routePermission('role.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('role.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('role.create')); ?>"><?php echo app('translator')->get('index.add_role'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('role.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('role.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('role.index')); ?>"><?php echo app('translator')->get('index.list_role'); ?></a>
                            </li>
                        <?php endif; ?>                        
                        <?php if(routePermission('user.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('user.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('user.create')); ?>"><?php echo app('translator')->get('index.add_user'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('user.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('user.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('user.index')); ?>"><?php echo app('translator')->get('index.list_user'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if(menuPermission('Settings')): ?>
                <li
                    class="parent-menu treeview menu__cidirp_10<?php echo e(request()->is('settings') || request()->is('white-label') || request()->is('taxes') || request()->is('units*') || request()->is('mail-settings') || request()->is('productionstages*') ? ' menu-open active_sub_menu' : ''); ?>">
                    <a href="#">
                        <iconify-icon icon="solar:settings-broken"></iconify-icon>
                        <span class="match_bold"><?php echo app('translator')->get('index.settings'); ?></span>
                    </a>
                    
                    <ul class="treeview-menu">                        
                        <?php if(routePermission('settings')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('settings') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('settings')); ?>">                                    
                                    <?php echo app('translator')->get('index.company_profile'); ?>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('taxes')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('taxes') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('taxes')); ?>"><?php echo app('translator')->get('index.tax_settings'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(isWhiteLabelChangeAble()): ?>
                            <?php if(routePermission('white-label')): ?>
                                <li class="menu_assign_class <?php echo e(request()->routeIs('white-label') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                        href="<?php echo e(route('white-label')); ?>"><?php echo app('translator')->get('index.white_label'); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(routePermission('mail-settings')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('settings.mail.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('settings.mail.index')); ?>"><?php echo app('translator')->get('index.mail_settings'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('productionstage.list')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('data-import') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('data-import')); ?>"><?php echo app('translator')->get('index.data_import'); ?></a>
                            </li>
                        <?php endif; ?>                        
                        <?php if(routePermission('units.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('units.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('units.create')); ?>"><?php echo app('translator')->get('index.add_unit'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('units.index')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('units.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('units.index')); ?>"><?php echo app('translator')->get('index.list_unit'); ?></a>
                            </li>
                        <?php endif; ?>                        
                        <?php if(routePermission('productionstage.create')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('productionstages.create') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('productionstages.create')); ?>"><?php echo app('translator')->get('index.add_production_stage'); ?></a>
                            </li>
                        <?php endif; ?>
                        <?php if(routePermission('productionstage.list')): ?>
                            <li class="menu_assign_class <?php echo e(request()->routeIs('productionstages.index') ? ' treeMenuActive' : ''); ?>" data-menu__cid="irp_10"><a
                                    href="<?php echo e(route('productionstages.index')); ?>"><?php echo app('translator')->get('index.list_production_stage'); ?></a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <div class="ps__rail-x">
                <div class="ps__thumb-x" tabindex="0"></div>
            </div>
            <div class="ps__rail-y">
                <div class="ps__thumb-y" tabindex="0"></div>
            </div>
        </ul>
    </div>
</section>
<?php /**PATH C:\xampp\htdocs\saibhagabati\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>