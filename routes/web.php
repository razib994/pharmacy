<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

// Route::get('/', function () {
//     return view('welcome');
// });


/*backend page setup*/
Route::get('/final',[
    "uses" =>"App\Http\Controllers\Backend\BackendController@login",
    "as" =>"login"
]);
Route::group(['middleware'=>'auth'],function(){




});
Route::get('/testing',[
    "uses" =>"App\Http\Controllers\Backend\BackendController@testing",
    "as" =>"testing"
]);


// Route::get('/admin',[
//  "uses" =>"Backend\BackendController@index",
//  "as" =>"admin"
// ]);
// User Route
Route::get('/all/user',[
    "uses" =>"App\Http\Controllers\Backend\UserRoleController@index",
    "as" =>"all_user"
]);

Route::get('user/add',[
    "uses" =>"App\Http\Controllers\Backend\UserRoleController@create",
    "as" =>"user_add"
]);

Route::post('user/store',[
    "uses" =>"App\Http\Controllers\Backend\UserRoleController@store",
    "as" =>"user_store"
]);

Route::get('user/delete/{id}',[
    "uses" =>"App\Http\Controllers\Backend\UserRoleController@delete",
    "as" =>"delete_user"
]);
Route::get('user/edit/{id}',[
    "uses" =>"App\Http\Controllers\Backend\UserRoleController@edit",
    "as" =>"edit_user"
]);
Route::post('user/update',[
    "uses" =>"App\Http\Controllers\Backend\UserRoleController@update",
    "as" =>"update_user"
]);








Route::get('/all/stock',[
  "uses" =>"App\Http\Controllers\Backend\StockController@index",
  "as" =>"all_stock"
]);

Route::get('/all/revenue',[
  "uses" =>"App\Http\Controllers\Backend\StockController@revenue_list",
  "as" =>"revenue_list"
]);
Route::get('/all/monthly/revenue',[
  "uses" =>"App\Http\Controllers\Backend\StockController@monthly_sales_revenue",
  "as" =>"monthly_sales_revenue"
]);
Route::get('/all/yearly/revenue',[
  "uses" =>"App\Http\Controllers\Backend\StockController@yearly_sales_revenue",
  "as" =>"yearly_sales_revenue"
]);
Route::get('/previous/year/sales/revenue',[
  "uses" =>"App\Http\Controllers\Backend\StockController@previous_year_sales_revenue",
  "as" =>"previous_year_sales_revenue"
]);
Route::get('/daily/sales',[
  "uses" =>"App\Http\Controllers\Backend\StockController@daily_sales",
  "as" =>"daily_sales"
]);
Route::get('/monthly/sales',[
  "uses" =>"App\Http\Controllers\Backend\StockController@monthly_sales",
  "as" =>"monthly_sales"
]);
Route::get('/yearly/sales',[
  "uses" =>"App\Http\Controllers\Backend\StockController@yearly_sales",
  "as" =>"yearly_sales"
]);
Route::get('/previous/year/sales',[
  "uses" =>"App\Http\Controllers\Backend\StockController@previous_year_sales",
  "as" =>"previous_year_sales"
]);
Route::get('/monthly/profit/loss',[
  "uses" =>"App\Http\Controllers\Backend\StockController@monthly_profit_loss",
  "as" =>"monthly_profit_loss"
]);
Route::get('/yearly/profit/loss',[
  "uses" =>"App\Http\Controllers\Backend\StockController@yearly_profit_loss",
  "as" =>"yearly_profit_loss"
]);
Route::get('/previous/year/profit/loss',[
  "uses" =>"App\Http\Controllers\Backend\StockController@previous_year_profit_loss",
  "as" =>"previous_year_profit_loss"
]);




//customer info
Route::group(['prefix'=>'customer','namespace'=>'App\Http\Controllers\BackEnd'],function(){

   Route::get('/list',[
	"uses" =>"CustomerController@index",
	"as" =>"customer_list"
   ]);

    Route::get('/add',[
	"uses" =>"CustomerController@add",
	"as" =>"customer_add"
   ]);

   Route::post('/store',[
	"uses" =>"CustomerController@store",
	"as" =>"customer_store"
   ]);

   Route::get('/delete/{id}',[
	"uses" =>"CustomerController@delete",
	"as" =>"delete_customer"
   ]);
   Route::get('/edit/{id}',[
	"uses" =>"CustomerController@edit",
	"as" =>"edit_customer"
   ]);
   Route::post('/update',[
	"uses" =>"CustomerController@update",
	"as" =>"update_customer"
   ]);

   Route::get('/credit',[
	 "uses" =>"CustomerController@credit",
     "as" =>"customer_credit"
   ]);

   Route::get('/credit/edit/{invoice_no}',[
   "uses" =>"CustomerController@edit_credit_customer",
     "as" =>"edit_credit_customer"
   ]);

   Route::post('/credit/update',[
   "uses" =>"CustomerController@update_credit_customer",
     "as" =>"update_credit_customer"
   ]);

   Route::get('/credit/payment/history',[
   "uses" =>"CustomerController@credit_customer_payment_history",
     "as" =>"credit_customer_payment_history"
   ]);

   Route::get('/credit/payment/history/delete/{id}',[
   "uses" =>"CustomerController@credit_customer_payment_history_delete",
     "as" =>"credit_customer_payment_history_delete"
   ]);

});


//manufacturer info
Route::group(['prefix'=>'manufacturer','namespace'=>'App\Http\Controllers\BackEnd'],function(){

   Route::get('/list',[
	"uses" =>"ManufacturerController@index",
	"as" =>"manufacturer_list"
   ]);


    Route::get('/add',[
	"uses" =>"ManufacturerController@add",
	"as" =>"manufacturer_add"
   ]);

   Route::post('/store',[
	"uses" =>"ManufacturerController@store",
	"as" =>"manufacturer_store"
   ]);

    Route::get('/delete/{id}',[
	"uses" =>"ManufacturerController@delete",
	"as" =>"manufacturer_delete"
   ]);


    Route::get('/edit/{id}',[
    	"uses" =>"ManufacturerController@edit",
    	"as" =>"manufacturer_edit"
   ]);

    Route::post('/update',[
	    "uses" =>"ManufacturerController@update",
	    "as" =>"manufacturer_update"
   ]);

    Route::get('/payable',[
      "uses" =>"ManufacturerController@payable_manufacturer",
      "as" =>"payable_manufacturer"
   ]);
    Route::get('/payable/edit/{id}',[
      "uses" =>"ManufacturerController@payable_manufacturer_edit",
      "as" =>"payable_manufacturer_edit"
   ]);
    Route::post('/payable/update',[
      "uses" =>"ManufacturerController@update_payable_manufacturer",
      "as" =>"update_payable_manufacturer"
   ]);
    Route::get('/payment/history',[
      "uses" =>"ManufacturerController@manufacturer_payments_history",
      "as" =>"manufacturer_payments_history"
   ]);
    Route::get('/payment/history/delete/{id}',[
      "uses" =>"ManufacturerController@manufacturer_payments_delete",
      "as" =>"manufacturer_payments_delete"
   ]);

});


//category info
Route::group(['prefix'=>'category','namespace'=>'App\Http\Controllers\BackEnd'],function(){

   Route::get('/list',[
	"uses" =>"CategoryController@index",
	"as" =>"category_list"
   ]);

    Route::get('/add',[
	"uses" =>"CategoryController@add",
	"as" =>"category_add"
   ]);

   Route::post('/store',[
	"uses" =>"CategoryController@store",
	"as" =>"category_store"
   ]);

    Route::get('/delete/{id}',[
	"uses" =>"CategoryController@delete",
	"as" =>"category_delete"
   ]);


    Route::get('/edit/{id}',[
	"uses" =>"CategoryController@edit",
	"as" =>"category_edit"
   ]);

    Route::post('/update',[
	"uses" =>"CategoryController@update",
	"as" =>"category_update"
   ]);

});

//unit info
Route::group(['prefix'=>'unit','namespace'=>'App\Http\Controllers\BackEnd'],function(){

   Route::get('/list',[
	"uses" =>"UnitController@index",
	"as" =>"unit_list"
   ]);

    Route::get('/add',[
	"uses" =>"UnitController@add",
	"as" =>"unit_add"
   ]);

   Route::post('/store',[
	"uses" =>"UnitController@store",
	"as" =>"unit_store"
   ]);

    Route::get('/delete/{id}',[
	"uses" =>"UnitController@delete",
	"as" =>"unit_delete"
   ]);


    Route::get('/edit/{id}',[
	"uses" =>"UnitController@edit",
	"as" =>"unit_edit"
   ]);

    Route::post('/update',[
	"uses" =>"UnitController@update",
	"as" =>"unit_update"
   ]);

});


//type info
Route::group(['prefix'=>'type','namespace'=>'App\Http\Controllers\BackEnd'],function(){

   Route::get('/list',[
  "uses" =>"TypeController@index",
  "as" =>"type_list"
   ]);

    Route::get('/add',[
  "uses" =>"TypeController@add",
  "as" =>"type_add"
   ]);

   Route::post('/store',[
  "uses" =>"TypeController@store",
  "as" =>"type_store"
   ]);

    Route::get('/delete/{id}',[
  "uses" =>"TypeController@delete",
  "as" =>"type_delete"
   ]);


    Route::get('/edit/{id}',[
  "uses" =>"TypeController@edit",
  "as" =>"type_edit"
   ]);

    Route::post('/update',[
  "uses" =>"TypeController@update",
  "as" =>"type_update"
   ]);

});



//medicine info
Route::group(['prefix'=>'medicine','namespace'=>'App\Http\Controllers\BackEnd'],function(){

   Route::get('/list',[
  "uses" =>"MedicineController@index",
  "as" =>"medicine_list"
   ]);

    Route::get('/add',[
  "uses" =>"MedicineController@add",
  "as" =>"medicine_add"
   ]);

   Route::post('/store',[
  "uses" =>"MedicineController@store",
  "as" =>"medicine_store"
   ]);

    Route::get('/delete/{id}',[
      "uses" =>"MedicineController@delete",
      "as" =>"medicine_delete"
   ]);


    Route::get('/edit/{id}',[
      "uses" =>"MedicineController@edit",
      "as" =>"medicine_edit"
   ]);

    Route::post('/update',[
      "uses" =>"MedicineController@update",
      "as" =>"medicine_update"
   ]);

});


//purchase info
Route::group(['prefix'=>'purchase','namespace'=>'App\Http\Controllers\BackEnd'],function(){

   Route::get('/invoice/list',[
      "uses" =>"PurchaseController@index",
      "as" =>"purchase_invoice_list"
   ]);

   //all purchase
   Route::get('/list',[
      "uses" =>"PurchaseController@purchase_list",
      "as" =>"purchase_list"
   ]);

    Route::get('/add',[
      "uses" =>"PurchaseController@add",
      "as" =>"purchase_add"
   ]);

   Route::get('/get/quantity',[
    "uses" =>"PurchaseController@get_quantity",
    "as" =>"get_quantity"
   ]);

    Route::post('store',[
      "uses" =>"PurchaseController@store",
      "as" =>"purchase_store"
   ]);

   Route::get('/edit/{invoice_no}',[
      "uses" =>"PurchaseController@edit",
      "as" =>"purchase_edit"
   ]);

   Route::get('/invoice/delete/{invoice_no}',[
      "uses" =>"PurchaseController@purchase_invoice_delete",
      "as" =>"purchase_invoice_delete"
   ]);

   Route::post('/invoice/update',[
      "uses" =>"PurchaseController@purchase_invoice_update",
      "as" =>"purchase_invoice_update"
   ]);


   Route::get('/item/wise/delete/{id}',[
      "uses" =>"PurchaseController@item_wise_purchase_list_delete",
      "as" =>"item_wise_purchase_list_delete"
   ]);



   Route::get('/invoice/overview/{invoice_no}',[
      "uses" =>"PurchaseController@purchase_invoice_overview",
      "as" =>"purchase_invoice_overview"
   ]);


});

//pos info
Route::group(['prefix'=>'pos','namespace'=>'App\Http\Controllers\BackEnd'],function(){

   Route::get('/list',[
      "uses" =>"PosController@index",
      "as" =>"pos_list"
   ]);

   Route::get('/overview/{invoice_no}',[
      "uses" =>"PosController@pos_overview",
      "as" =>"pos_overview"
   ]);

   Route::get('/print/{invoice_no}',[
      "uses" =>"PosController@invoice_print",
      "as" =>"invoice_print"
   ]);

   Route::get('/add',[
      "uses" =>"PosController@add",
      "as" =>"add_pos"
   ]);

    Route::post('/store',[
      "uses" =>"PosController@store",
      "as" =>"pos_store"
   ]);

   Route::get('/delete/{id}',[
      "uses" =>"PosController@delete",
      "as" =>"pos_delete"
   ]);
   Route::get('/edit/{invoice_no}',[
      "uses" =>"PosController@edit",
      "as" =>"pos_edit"
   ]);
   Route::post('/update',[
      "uses" =>"PosController@update",
      "as" =>"pos_update"
   ]);

   Route::get('/sale/unit/price',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price"
   ]);

   Route::get('/purchase/unit/price',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price"
   ]);

   Route::get('/avaiable/quantity',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity"
   ]);

   Route::get('/avaiable/quantity1',[
      "uses" =>"App\Http\Controllers\PosController@get_available_quantity",
      "as" =>"get_available_quantity1"
   ]);
    Route::get('/avaiable/quantity2',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity2"
   ]);

Route::get('/avaiable/quantity3',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity3"
   ]);

Route::get('/avaiable/quantity4',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity4"
   ]);
Route::get('/avaiable/quantity5',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity5"
   ]);


 Route::get('/avaiable/quantity6',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity6"
   ]);
    Route::get('/avaiable/quantity7',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity7"
   ]);

Route::get('/avaiable/quantity8',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity8"
   ]);

Route::get('/avaiable/quantity9',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity9"
   ]);
Route::get('/avaiable/quantity10',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity10"
   ]);

Route::get('/avaiable/quantity11',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity11"
   ]);
    Route::get('/avaiable/quantity12',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity12"
   ]);

Route::get('/avaiable/quantity13',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity13"
   ]);

Route::get('/avaiable/quantity14',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity14"
   ]);
Route::get('/avaiable/quantity15',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity15"
   ]);
Route::get('/avaiable/quantity16',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity16"
   ]);
    Route::get('/avaiable/quantity17',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity17"
   ]);

Route::get('/avaiable/quantity18',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity18"
   ]);

Route::get('/avaiable/quantity19',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity19"
   ]);
Route::get('/avaiable/quantity20',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity20"
   ]);
Route::get('/avaiable/quantity21',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity21"
   ]);
    Route::get('/avaiable/quantity22',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity22"
   ]);

Route::get('/avaiable/quantity23',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity23"
   ]);

Route::get('/avaiable/quantity24',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity24"
   ]);
Route::get('/avaiable/quantity25',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity25"
   ]);
Route::get('/avaiable/quantity26',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity26"
   ]);
    Route::get('/avaiable/quantity27',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity27"
   ]);

Route::get('/avaiable/quantity28',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity28"
   ]);

Route::get('/avaiable/quantity29',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity29"
   ]);
Route::get('/avaiable/quantity30',[
      "uses" =>"PosController@get_available_quantity",
      "as" =>"get_available_quantity30"
   ]);



// Purchest and Sales unit================
    Route::get('/sale/unit/price1',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price1"
   ]);

   Route::get('/purchase/unit/price1',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price1"
   ]);
    Route::get('/sale/unit/price2',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price2"
   ]);

   Route::get('/purchase/unit/price2',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price2"
   ]);
    Route::get('/sale/unit/price3',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price3"
   ]);

   Route::get('/purchase/unit/price3',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price3"
   ]);
    Route::get('/sale/unit/price4',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price4"
   ]);

   Route::get('/purchase/unit/price4',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price4"
   ]);
    Route::get('/sale/unit/price5',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price5"
   ]);

   Route::get('/purchase/unit/price5',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price5"
   ]);
    Route::get('/sale/unit/price6',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price6"
   ]);

   Route::get('/purchase/unit/price6',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price6"
   ]);
    Route::get('/sale/unit/price7',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price7"
   ]);

   Route::get('/purchase/unit/price7',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price7"
   ]);
    Route::get('/sale/unit/price8',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price8"
   ]);

   Route::get('/purchase/unit/price8',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price8"
   ]);
    Route::get('/sale/unit/price9',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price9"
   ]);

   Route::get('/purchase/unit/price9',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price9"
   ]);
    Route::get('/sale/unit/price10',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price10"
   ]);

   Route::get('/purchase/unit/price10',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price10"
   ]);
    Route::get('/sale/unit/price11',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price11"
   ]);

   Route::get('/purchase/unit/price11',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price11"
   ]);
    Route::get('/sale/unit/price12',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price12"
   ]);

   Route::get('/purchase/unit/price12',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price12"
   ]);
    Route::get('/sale/unit/price13',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price13"
   ]);

   Route::get('/purchase/unit/price13',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price13"
   ]);
    Route::get('/sale/unit/price14',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price14"
   ]);

   Route::get('/purchase/unit/price14',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price14"
   ]);
    Route::get('/sale/unit/price15',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price15"
   ]);

   Route::get('/purchase/unit/price15',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price15"
   ]);
    Route::get('/sale/unit/price16',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price16"
   ]);

   Route::get('/purchase/unit/price16',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price16"
   ]);
    Route::get('/sale/unit/price17',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price17"
   ]);

   Route::get('/purchase/unit/price17',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price17"
   ]);
    Route::get('/sale/unit/price18',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price18"
   ]);

   Route::get('/purchase/unit/price18',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price18"
   ]);
    Route::get('/sale/unit/price19',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price19"
   ]);

   Route::get('/purchase/unit/price19',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price19"
   ]);
    Route::get('/sale/unit/price20',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price20"
   ]);

   Route::get('/purchase/unit/price20',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price20"
   ]);
    Route::get('/sale/unit/price21',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price21"
   ]);

   Route::get('/purchase/unit/price21',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price21"
   ]);
    Route::get('/sale/unit/price22',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price22"
   ]);

   Route::get('/purchase/unit/price22',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price22"
   ]);
    Route::get('/sale/unit/price23',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price23"
   ]);

   Route::get('/purchase/unit/price23',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price23"
   ]);
    Route::get('/sale/unit/price24',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price24"
   ]);

   Route::get('/purchase/unit/price24',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price24"
   ]);
    Route::get('/sale/unit/price25',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price25"
   ]);

   Route::get('/purchase/unit/price25',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price25"
   ]);
    Route::get('/sale/unit/price26',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price26"
   ]);

   Route::get('/purchase/unit/price26',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price26"
   ]);
    Route::get('/sale/unit/price27',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price27"
   ]);

   Route::get('/purchase/unit/price27',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price27"
   ]);
    Route::get('/sale/unit/price28',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price28"
   ]);

   Route::get('/purchase/unit/price28',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price28"
   ]);
    Route::get('/sale/unit/price29',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price29"
   ]);

   Route::get('/purchase/unit/price29',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price29"
   ]);
    Route::get('/sale/unit/price30',[
      "uses" =>"PosController@get_sale_unit_price",
      "as" =>"get_sale_unit_price30"
   ]);

   Route::get('/purchase/unit/price30',[
      "uses" =>"PosController@get_purchase_unit_price",
      "as" =>"get_purchase_unit_price30"
   ]);




});


//pos info
Route::group(['prefix'=>'expense','namespace'=>'App\Http\Controllers\BackEnd'],function(){

   Route::get('/all',[
      "uses" =>"ExpenseController@index",
      "as" =>"all_expense"
   ]);
   Route::get('/download/excel',[
      "uses" =>"ExpenseController@download_excel",
      "as" =>"download_excel"
   ]);

   Route::get('/add',[
      "uses" =>"ExpenseController@add",
      "as" =>"add_expense"
   ]);

   Route::post('/store',[
      "uses" =>"ExpenseController@store",
      "as" =>"store_expense"
   ]);

   Route::get('/delete/{id}',[
      "uses" =>"ExpenseController@delete",
      "as" =>"expense_delete"
   ]);

   Route::get('/edit/{id}',[
      "uses" =>"ExpenseController@edit",
      "as" =>"edit_expense"
   ]);
   Route::post('/update',[
      "uses" =>"ExpenseController@update",
      "as" =>"update_expense"
   ]);
   Route::get('/monthly',[
      "uses" =>"ExpenseController@monthly",
      "as" =>"monthly_expense"
   ]);
   Route::get('/yearly',[
      "uses" =>"ExpenseController@yearly",
      "as" =>"yearly_expense"
   ]);
   Route::get('/previous/year',[
      "uses" =>"ExpenseController@previous_year_expense",
      "as" =>"previous_year_expense"
   ]);





});

Route::get('/sales/return/delete/{id}',[
    "uses" =>"App\Http\Controllers\BackEnd\ReturnController@salesreutrndelete",
    "as" =>"sales_reutrn_delete"
]);
// return working
Route::group(['prefix'=>'return','namespace'=>'App\Http\Controllers\BackEnd'],function(){

   Route::get('/purchase/list',[
      "uses" =>"ReturnController@purchase_return_list",
      "as" =>"purchase_return_list"
   ]);

   Route::get('/purchase/add',[
      "uses" =>"ReturnController@add_purchase_return",
      "as" =>"add_purchase_return"
   ]);

   Route::post('/purchase/store',[
      "uses" =>"ReturnController@store_purchase_return",
      "as" =>"store_purchase_return"
   ]);

    Route::get('/sales/list',[
        "uses" =>"ReturnController@sales_return_list",
        "as" =>"sales_return_list"
     ]);

    Route::get('/sales/add',[
        "uses" =>"ReturnController@add_sales_return",
        "as" =>"add_sales_return"
     ]);

    Route::post('/sales/store',[
        "uses" =>"ReturnController@store_sales_return",
        "as" =>"store_sales_return"
     ]);


});



/*backend page setup*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/user', 'App\Http\Controllers\BackEnd\UserRoleController@export');

Route::get('users/export/', [Controllers\BackEnd\StockController::class, 'export']);
Route::get('saleReturnExport', [Controllers\BackEnd\ReturnController::class, 'saleReturnExport']);
Route::get('/customer_excel', [Controllers\BackEnd\CustomerController::class, 'customer_excel']);
Route::get('/credit_customer_excel', [Controllers\BackEnd\PosController::class, 'credit_customer_excel']);
Route::get('/credit_customer_payment_history', [Controllers\BackEnd\PosController::class, 'credit_customer_payment_history']);
Route::get('/manufacturer_payment_history ', [Controllers\BackEnd\PosController::class, 'manufacturer_payment_history']);
Route::get('/manufacturer_excel_downlaod', [Controllers\BackEnd\PosController::class, 'manufacturer_excel_downlaod']);
Route::get('/payable_manufacturer_download', [Controllers\BackEnd\PosController::class, 'payable_manufacturer_download']);
Route::get('/medicine_excel_download', [Controllers\BackEnd\PosController::class, 'medicine_excel_download']);
Route::get('/purchase_return_list_downlaod ', [Controllers\BackEnd\PosController::class, 'purchase_return_list_downlaod']);
Route::get('/daily_excel_download', [Controllers\BackEnd\PosController::class, 'daily_excel_download']);
Route::get('/monthly_excel_download', [Controllers\BackEnd\PosController::class, 'monthly_excel_download']);
Route::get('/yealy_excel_download', [Controllers\BackEnd\PosController::class, 'yealy_excel_download']);
Route::get('/previous_excel_download', [Controllers\BackEnd\PosController::class, 'previous_excel_download']);

Route::get('/daily_sale_revenue_excel_download', [Controllers\BackEnd\PosController::class, 'daily_sale_revenue_excel_download']);
Route::get('/monthly_sale_revenue_excel_download', [Controllers\BackEnd\PosController::class, 'monthly_sale_revenue_excel_download']);
Route::get('/yealy_sale_revenue_excel_download', [Controllers\BackEnd\PosController::class, 'yealy_sale_revenue_excel_download']);
Route::get('/previous_sale_revenue_excel_download', [Controllers\BackEnd\PosController::class, 'previous_sale_revenue_excel_download']);

Route::get('/get_expense_excel_download', [Controllers\BackEnd\PosController::class, 'get_expense_excel_download']);
Route::get('/get_expense_monthly_excel_download', [Controllers\BackEnd\PosController::class, 'get_expense_monthly_excel_download']);
Route::get('/get_expense_excel_yearly_download', [Controllers\BackEnd\PosController::class, 'get_expense_excel_yearly_download']);
Route::get('/get_expense_excel_previous_download', [Controllers\BackEnd\PosController::class, 'get_expense_excel_previous_download']);

Route::get('/return_purches_excel', [Controllers\BackEnd\PosController::class, 'return_purches_excel']);
Route::get('/sale_return_list_excel', [Controllers\BackEnd\PosController::class, 'sale_return_list_excel']);
Route::get('/get_purches_list_excel', [Controllers\BackEnd\PosController::class, 'get_purches_list_excel']);
Route::get('/get_stock_list_excel', [Controllers\BackEnd\PosController::class, 'get_stock_list_excel']);
Route::get('/get_purchase_invoice_list', [Controllers\BackEnd\PosController::class, 'get_purchase_invoice_list']);
Route::get('/get_all_invoices', [Controllers\BackEnd\PosController::class, 'get_all_invoices']);
Route::get('/get_profit_loss_monthly', [Controllers\BackEnd\PosController::class, 'get_profit_loss_monthly']);
Route::get('/get_profit_loss_yearly', [Controllers\BackEnd\PosController::class, 'get_profit_loss_yearly']);
Route::get('/get_profit_loss_previous', [Controllers\BackEnd\PosController::class, 'get_profit_loss_previous']);
