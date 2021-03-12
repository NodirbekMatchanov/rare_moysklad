<?php

namespace rare\mysklad\Registers;

use rare\mysklad\Entities\AbstractEntity;
use rare\mysklad\Entities\Account;
use rare\mysklad\Entities\Assortment;
use rare\mysklad\Entities\Audit\Audit;
use rare\mysklad\Entities\Audit\AuditEvent;
use rare\mysklad\Entities\Cashier;
use rare\mysklad\Entities\ContactPerson;
use rare\mysklad\Entities\Contract;
use rare\mysklad\Entities\Counterparty;
use rare\mysklad\Entities\Country;
use rare\mysklad\Entities\Currency;
use rare\mysklad\Entities\Discount;
use rare\mysklad\Entities\Documents\AbstractDocument;
use rare\mysklad\Entities\Documents\Cash\AbstractCash;
use rare\mysklad\Entities\Documents\Cash\CashIn;
use rare\mysklad\Entities\Documents\Cash\CashOut;
use rare\mysklad\Entities\Documents\CommissionReports\AbstractCommissionReport;
use rare\mysklad\Entities\Documents\CommissionReports\CommissionReportIn;
use rare\mysklad\Entities\Documents\CommissionReports\CommissionReportOut;
use rare\mysklad\Entities\Documents\Factures\AbstractFacture;
use rare\mysklad\Entities\Documents\Factures\FactureIn;
use rare\mysklad\Entities\Documents\Factures\FactureOut;
use rare\mysklad\Entities\Documents\Inventory;
use rare\mysklad\Entities\Documents\Movements\AbstractMovement;
use rare\mysklad\Entities\Documents\Movements\Demand;
use rare\mysklad\Entities\Documents\Movements\Enter;
use rare\mysklad\Entities\Documents\Movements\Loss;
use rare\mysklad\Entities\Documents\Movements\Supply;
use rare\mysklad\Entities\Documents\Movements\Move;
use rare\mysklad\Entities\Documents\Payments\PaymentOut;
use rare\mysklad\Entities\Documents\Payments\PaymentIn;
use rare\mysklad\Entities\Documents\Orders\AbstractOrder;
use rare\mysklad\Entities\Documents\Orders\CustomerOrder;
use rare\mysklad\Entities\Documents\Orders\PurchaseOrder;
use rare\mysklad\Entities\Documents\Positions\AbstractPosition;
use rare\mysklad\Entities\Documents\Positions\CustomerOrderPosition;
use rare\mysklad\Entities\Documents\Positions\InventoryPosition;
use rare\mysklad\Entities\Documents\Positions\DemandPosition;
use rare\mysklad\Entities\Documents\Positions\EnterPosition;
use rare\mysklad\Entities\Documents\Positions\LossPosition;
use rare\mysklad\Entities\Documents\Positions\MovePosition;
use rare\mysklad\Entities\Documents\Positions\SalesReturnPosition;
use rare\mysklad\Entities\Documents\Positions\SupplyPosition;
use rare\mysklad\Entities\Documents\PriceLists\PriceList;
use rare\mysklad\Entities\Documents\PriceLists\PriceListRow;
use rare\mysklad\Entities\Documents\Processings\ProcessingMaterial;
use rare\mysklad\Entities\Documents\Processings\ProcessingPlanFolder;
use rare\mysklad\Entities\Documents\Processings\ProcessingPlanMaterial;
use rare\mysklad\Entities\Documents\Processings\ProcessingPlanProduct;
use rare\mysklad\Entities\Documents\Processings\ProcessingProduct;
use rare\mysklad\Entities\Documents\Templates\CustomTemplate;
use rare\mysklad\Entities\Products\Components\AbstractComponent;
use rare\mysklad\Entities\Products\Components\BundleComponent;
use rare\mysklad\Entities\Documents\Processings\AbstractProcessing;
use rare\mysklad\Entities\Documents\Processings\Processing;
use rare\mysklad\Entities\Documents\Processings\ProcessingOrder;
use rare\mysklad\Entities\Documents\Processings\ProcessingPlan;
use rare\mysklad\Entities\Documents\Retail\AbstractRetail;
use rare\mysklad\Entities\Documents\Retail\RetailDemand;
use rare\mysklad\Entities\Documents\Retail\RetailSalesReturn;
use rare\mysklad\Entities\Documents\RetailDrawer\AbstractRetailDrawer;
use rare\mysklad\Entities\Documents\RetailDrawer\RetailDrawerCashIn;
use rare\mysklad\Entities\Documents\RetailDrawer\RetailDrawerCashOut;
use rare\mysklad\Entities\Documents\RetailShift;
use rare\mysklad\Entities\Documents\Returns\AbstractReturn;
use rare\mysklad\Entities\Documents\Returns\PurchaseReturn;
use rare\mysklad\Entities\Documents\Returns\SalesReturn;
use rare\mysklad\Entities\Employee;
use rare\mysklad\Entities\ExpenseItem;
use rare\mysklad\Entities\Folders\ProductFolder;
use rare\mysklad\Entities\Group;
use rare\mysklad\Entities\Misc\Attribute;
use rare\mysklad\Entities\Misc\Characteristics;
use rare\mysklad\Entities\Misc\CompanySettings;
use rare\mysklad\Entities\Misc\CustomEntity;
use rare\mysklad\Entities\Misc\Publication;
use rare\mysklad\Entities\Misc\State;
use rare\mysklad\Entities\Misc\Webhook;
use rare\mysklad\Entities\Organization;
use rare\mysklad\Entities\Products\AbstractProduct;
use rare\mysklad\Entities\Products\Bundle;
use rare\mysklad\Entities\Products\Consignment;
use rare\mysklad\Entities\Products\Product;
use rare\mysklad\Entities\Products\Service;
use rare\mysklad\Entities\Products\Variant;
use rare\mysklad\Entities\Project;
use rare\mysklad\Entities\RetailStore;
use rare\mysklad\Entities\Store;
use rare\mysklad\Entities\Uom;
use rare\mysklad\Entities\Bonustransaction;
use rare\mysklad\Entities\Bonusprogram;
use rare\mysklad\Utils\AbstractSingleton;

/**
 * Map of entity name => representing class
 * Class EntityRegistry
 * @package rare\mysklad\Registries
 */
class EntityRegistry extends AbstractSingleton{
    protected static $instance = null;
    public $entities = [
        AbstractEntity::class,
        AbstractDocument::class,
        PaymentIn::class,
        PaymentOut::class,
        AbstractOrder::class,
        CustomerOrder::class,
        PurchaseOrder::class,
        Assortment::class,
        Counterparty::class,
        Organization::class,
        AbstractProduct::class,
        Product::class,
        Bundle::class,
        Service::class,
        Employee::class,
        Group::class,
        Uom::class,
        Account::class,
        ContactPerson::class,
        State::class,
        AbstractPosition::class,
        LossPosition::class,
        EnterPosition::class,
        MovePosition::class,
        CustomerOrderPosition::class,
        InventoryPosition::class,
        DemandPosition::class,
        SupplyPosition::class,
        SalesReturnPosition::class,
        AbstractComponent::class,
        BundleComponent::class,
        Country::class,
        Webhook::class,
        ProductFolder::class,
        Consignment::class,
        Variant::class,
        AbstractMovement::class,
        Enter::class,
        Move::class,
        Attribute::class,
        Publication::class,
        Store::class,
        Characteristics::class,
        CompanySettings::class,
        CustomEntity::class,
        CustomTemplate::class,
        Cashier::class,
        Contract::class,
        Discount::class,
        ExpenseItem::class,
        Project::class,
        RetailStore::class,
        Currency::class,
        Loss::class,
        Demand::class,
        Supply::class,
        AbstractCash::class,
        CashIn::class,
        CashOut::class,
        AbstractRetail::class,
        RetailSalesReturn::class,
        RetailDemand::class,
        AbstractRetailDrawer::class,
        RetailDrawerCashIn::class,
        RetailDrawerCashOut::class,
        AbstractReturn::class,
        PurchaseReturn::class,
        SalesReturn::class,
        AbstractFacture::class,
        FactureIn::class,
        FactureOut::class,
        Inventory::class,
        RetailShift::class,
        AbstractCommissionReport::class,
        CommissionReportIn::class,
        CommissionReportOut::class,
        AbstractProcessing::class,
        Processing::class,
        ProcessingOrder::class,
        ProcessingPlan::class,
        ProcessingPlanFolder::class,
        PriceList::class,
        PriceListRow::class,
        Audit::class,
        AuditEvent::class,
        ProcessingPlanMaterial::class,
        ProcessingPlanProduct::class,
        ProcessingProduct::class,
        ProcessingMaterial::class,
        Bonustransaction::class,
        Bonusprogram::class
    ];
    public $entityNames = [];

    protected function __construct()
    {
        foreach ($this->entities as $i=>$e){
            $this->entityNames[$e::$entityName] = $e;
        }
    }

    public function bootEntities(){
        foreach ($this->entities as $e){
            $e::boot();
        }
    }
}
