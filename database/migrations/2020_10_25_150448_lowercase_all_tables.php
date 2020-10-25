<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LowercaseAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('BeginBill', strtolower('BeginBill'));
        Schema::rename('Bill', strtolower('Bill'));
        Schema::rename('BlackList', strtolower('BlackList'));
        Schema::rename('Business', strtolower('Business'));
        Schema::rename('Card', strtolower('Card'));
        Schema::rename('CashClosure', strtolower('CashClosure'));
        Schema::rename('CashClosureTotal', strtolower('CashClosureTotal'));
        Schema::rename('Checkin', strtolower('Checkin'));
        Schema::rename('Checkout', strtolower('Checkout'));
        Schema::rename('Cleaning', strtolower('Cleaning'));
        Schema::rename('CleaningExtra', strtolower('CleaningExtra'));
        Schema::rename('CleaningLog', strtolower('CleaningLog'));
        Schema::rename('Folder', strtolower('Folder'));
        Schema::rename('Furniture', strtolower('Furniture'));
        Schema::rename('Help', strtolower('Help'));
        Schema::rename('Hotel', strtolower('Hotel'));
        Schema::rename('HotelParking',  strtolower('HotelParking'));
        Schema::rename('Kasboek',  strtolower('Kasboek'));
        Schema::rename('KasboekContanten', strtolower('KasboekContanten'));
        Schema::rename('KasboekFloats', strtolower('KasboekFloats'));
        Schema::rename('KasboekHotel', strtolower('KasboekHotel'));
        Schema::rename('KasboekHotelFloat', strtolower('KasboekHotelFloat'));
        Schema::rename('KasboekHotelForms', strtolower('KasboekHotelForms'));
        Schema::rename('KasboekIn', strtolower('KasboekIn'));
        Schema::rename('KasboekKas', strtolower('KasboekKas'));
        Schema::rename('KasboekOut', strtolower('KasboekOut'));
        Schema::rename('KasboekSalarissen', strtolower('KasboekSalarissen'));
        Schema::rename('KasboekTurnover', strtolower('KasboekTurnover'));
        Schema::rename('Listing', strtolower('Listing'));
        Schema::rename('ListingCalendar', strtolower('ListingCalendar'));
        Schema::rename('Log', strtolower('Log'));
        Schema::rename('Notifier', strtolower('Notifier'));
        Schema::rename('Parameters', strtolower('Parameters'));
        Schema::rename('PaymentMethod', strtolower('PaymentMethod'));
        Schema::rename('RCheckinHotel', strtolower('RCheckinHotel'));
        Schema::rename('RCheckoutHotel', strtolower('RCheckoutHotel'));
        Schema::rename('RCleaningExtraHotel', strtolower('RCleaningExtraHotel'));
        Schema::rename('Reception', strtolower('Reception'));
        Schema::rename('ReceptionParking', strtolower('ReceptionParking'));
        Schema::rename('ReceptionVoucher', strtolower('ReceptionVoucher'));
        Schema::rename('ReportIssue', strtolower('ReportIssue'));
        Schema::rename('ReportPlanning', strtolower('ReportPlanning'));
        Schema::rename('RFolderFolder', strtolower('RFolderFolder'));
        Schema::rename('RFolderFurniture', strtolower('RFolderFurniture'));
        Schema::rename('RFurnitureTags', strtolower('RFurnitureTags'));
        Schema::rename('RNotifierForm', strtolower('RNotifierForm'));
        Schema::rename('Rule', strtolower('Rule'));
        Schema::rename('RuleLog', strtolower('RuleLog'));
        Schema::rename('Skybar', strtolower('Skybar'));
        Schema::rename('Source', strtolower('Source'));
        Schema::rename('SourceGuesty', strtolower('SourceGuesty'));
        Schema::rename('Status', strtolower('Status'));
        Schema::rename('Tag', strtolower('Tag'));
        Schema::rename('Turnover', strtolower('Turnover'));
        Schema::rename('TurnoverOmzet', strtolower('TurnoverOmzet'));
        Schema::rename('TurnoverReception', strtolower('TurnoverReception'));
        Schema::rename('TurnoverService', strtolower('TurnoverService'));
        Schema::rename('TurnoverSkybar', strtolower('TurnoverSkybar'));
        Schema::rename('Worker', strtolower('Worker'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename(strtolower('BeginBill'), 'BeginBill');
        Schema::rename(strtolower('Bill'),'Bill');
        Schema::rename(strtolower('BlackList'), 'BlackList');
        Schema::rename(strtolower('Business'), 'Business');
        Schema::rename(strtolower('Card'), 'Card');
        Schema::rename(strtolower('CashClosure'), 'CashClosure');
        Schema::rename(strtolower('CashClosureTotal'), 'CashClosureTotal');
        Schema::rename(strtolower('Checkin'), 'Checkin');
        Schema::rename(strtolower('Checkout'), 'Checkout');
        Schema::rename(strtolower('Cleaning'), 'Cleaning');
        Schema::rename(strtolower('CleaningExtra'), 'CleaningExtra');
        Schema::rename(strtolower('CleaningLog'),'CleaningLog');
        Schema::rename(strtolower('Folder'), 'Folder');
        Schema::rename(strtolower('Furniture'),'Furniture');
        Schema::rename(strtolower('Help'), 'Help');
        Schema::rename(strtolower('Hotel'), 'Hotel');
        Schema::rename(strtolower('HotelParking'), 'HotelParking');
        Schema::rename(strtolower('Kasboek'), 'Kasboek');
        Schema::rename(strtolower('KasboekContanten'), 'KasboekContanten');
        Schema::rename(strtolower('KasboekFloats'),'KasboekFloats');
        Schema::rename(strtolower('KasboekHotel'), 'KasboekHotel');
        Schema::rename(strtolower('KasboekHotelFloat'), 'KasboekHotelFloat');
        Schema::rename(strtolower('KasboekHotelForms'), 'KasboekHotelForms');
        Schema::rename(strtolower('KasboekIn'), 'KasboekIn');
        Schema::rename(strtolower('KasboekKas'), 'KasboekKas');
        Schema::rename(strtolower('KasboekOut'), 'KasboekOut');
        Schema::rename(strtolower('KasboekSalarissen'), 'KasboekSalarissen');
        Schema::rename(strtolower('KasboekTurnover'),'KasboekTurnover');
        Schema::rename(strtolower('Listing'), 'Listing');
        Schema::rename(strtolower('ListingCalendar'),'ListingCalendar');
        Schema::rename(strtolower('Log'), 'Log');
        Schema::rename(strtolower('Notifier'), 'Notifier');
        Schema::rename(strtolower('Parameters'), 'Parameters');
        Schema::rename(strtolower('PaymentMethod'), 'PaymentMethod');
        Schema::rename(strtolower('RCheckinHotel'), 'RCheckinHotel');
        Schema::rename(strtolower('RCheckoutHotel'), 'RCheckoutHote');
        Schema::rename(strtolower('RCleaningExtraHotel'), 'RCleaningExtraHotel');
        Schema::rename(strtolower('Reception'), 'Reception');
        Schema::rename(strtolower('ReceptionParking'), 'ReceptionParking');
        Schema::rename(strtolower('ReceptionVoucher'), 'ReceptionVoucher');
        Schema::rename(strtolower('ReportIssue'), 'ReportIssue');
        Schema::rename(strtolower('ReportPlanning'), 'ReportPlanning');
        Schema::rename(strtolower('RFolderFolder'), 'RFolderFolder');
        Schema::rename(strtolower('RFolderFurniture'),'RFolderFurniture');
        Schema::rename(strtolower('RFurnitureTags'), 'RFurnitureTags');
        Schema::rename(strtolower('RNotifierForm'), 'RNotifierForm');
        Schema::rename(strtolower('Rule'), 'Rule');
        Schema::rename(strtolower('RuleLog'), 'RuleLog');
        Schema::rename(strtolower('Skybar'), 'Skybar');
        Schema::rename(strtolower('Source'), 'Source');
        Schema::rename(strtolower('SourceGuesty'), 'SourceGuesty');
        Schema::rename(strtolower('Status'), 'Status');
        Schema::rename(strtolower('Tag'), 'Tag');
        Schema::rename(strtolower('Turnover'), 'Turnover');
        Schema::rename(strtolower('TurnoverOmzet'), 'TurnoverOmzet');
        Schema::rename(strtolower('TurnoverReception'), 'TurnoverReception');
        Schema::rename(strtolower('TurnoverService'),'TurnoverService');
        Schema::rename(strtolower('TurnoverSkybar'), 'TurnoverSkybar');
        Schema::rename(strtolower('Worker'), 'Worker');
    }
}
