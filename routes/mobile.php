<?php
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    Use App\Http\Controllers\UserAuthController;
    use App\Http\Controllers\UserApartmenttController;
    use App\Http\Controllers\RentController;
    use App\Http\Models\User;

    Route::prefix('/user')->group(function () {

    Route::get('ping', function() {
    return "server is up to work 🤡"; });
    // return User::with('Rents')->get();
    // });
    Route::post('/New_Acount',[UserAuthController::class,'NewAcount']);
    Route::post('/login',[UserAuthController::class,'login'])->name('MoblieLogin');
    Route::post('/verify_otp', [UserAuthController::class,'verifyOtp']);
    Route::get('/aparments', [UserApartmenttController::class,'fecthApartment'])->name('fecthApartment');

     ///Rent section

    Route::post('/Reservation', [RentController::class,'Reservation'])->name('Reservation');
    Route::get('/Reservationindex', [RentController::class,'index'])->name('Reservationindex');
    Route::delete('/cancelReservation', [RentController::class,'cancelReservation'])->name('cancelReservation');

    Route::middleware(['auth:sanctum'])->group(function () {
        // Route::get('/aparments',[UserApartmenttController::class,'fecthApartment']);

    // Route::get('/aparments/{class}', [UserApartmenttController::class,'fecthApartment'])->name('fecthApartment');

    });
});
