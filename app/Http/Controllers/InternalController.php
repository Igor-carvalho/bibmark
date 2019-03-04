<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\{LoginRequest, CreateOrUpdateUserUnderAccountRequest, GetAllUsersRequest, CreateOrUpdateUserRequest};
use App\Http\Requests\Account\{CreateOrUpdateAccountRequest};
use App\Http\Requests\Charity\{CreateOrUpdateCharityRequest};
use App\Http\Requests\Event\{CreateOrUpdateEventRequest, RegisterEventRequest};
use App\Http\Requests\Product\{CreateOrUpdateProductRequest, AddProductToSizeRequest};
use App\Http\Requests\Location\{CreateAddressRequest, CreateOrUpdateLocationRequest};
use App\Http\Requests\Order\{CreateOrUpdateOrderItemRequest, UpdateOrderRequest, PlaceOrderRequest};
use App\Http\Requests\Billing\{CreateBillingRequest};
use App\Http\Requests\Design\{CreateOrUpdateDesignRequest, UploadDesignFileRequest};
use App\Http\Requests\UploadImageRequest;
use App\Services\{AccountService, CharityService, EventService, UserService, ProductService, LocationService, AddressService, OrderService, BillingService, DesignService, ExtraService, ShippingService};
use App\Http\Resources\{AccountResource, AccountCollection, CharityResource, CharityCollection, EventResource, EventCollection, UserResource, UserCollection, ProductResource, ProductCollection};
use App\Http\Resources\{LocationResource, LocationCollection, AddressResource, OrderItemResource, OrderItemCollection, OrderResource, OrderCollection, DesignResource, DesignCollection};
use Illuminate\Support\Facades\Redirect;

class InternalController extends Controller
{
    public function __construct()
    {

    }

    /**
     * Authenticate a user
     *
     * @param App\Http\Requests\User\LoginRequest $request
     * @return Illuminate\Http\RedirectResponse
     */

    public function login(LoginRequest $request)
    {
        $data = $request->all();
        $remember = isset($data['remember']) && $data['remember'] == 1;
        $authenticated = Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password']
        ], $remember);

        if ($authenticated) {
            return redirect('/dashboard');
        } else {
            //return redirect('/admin/login');
            return Redirect::back()->withErrors('Incorrect email or password');
        }
    }

    /**
     * Log out a user
     *
     * @return Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    /**
     * Get all accounts
     *
     * @param App\Services\AccountService $accountService
     * @return \Illuminate\Http\Response
     */
    public function accounts(AccountService $accountService)
    {
        $result = new AccountCollection($accountService->getAllAccounts());

        return response()->json($result, 200);
    }

    /**
     * Create or Update an account
     *
     * @param App\Http\Requests\Account\CreateOrUpdateAccountRequest $request
     * @param App\Services\AccountService $accountService
     * @return \Illuminate\Http\Response
     */
    public function createOrUpdateAccount(CreateOrUpdateAccountRequest $request, AccountService $accountService)
    {
        $result = new AccountResource($accountService->createOrUpdateAccount($request->all()));

        return response()->json($result, 200);
    }

    /**
     * Delete an account
     *
     * @param integer $accountId
     * @param App\Services\AccountService $accountService
     * @return \Illuminate\Http\Response
     */
    public function deleteAccount($accountId, AccountService $accountService)
    {
        $result = $accountService->deleteAccount($accountId);

        return response()->json($result, 200);
    }

    /**
     * Get account details
     *
     * @param integer $accountId
     * @param App\Services\AccountService $accountService
     * @return \Illuminate\Http\Response
     */
    public function accountDetails($accountId, AccountService $accountService)
    {
        $result = new AccountResource($accountService->getAccountById($accountId));

        return response()->json($result, 200);
    }

    /**
     * Get all charities
     *
     * @param App\Services\CharityService $charityService
     * @return \Illuminate\Http\Response
     */
    public function charities(CharityService $charityService)
    {
        $result = new CharityCollection($charityService->getAllCharities());

        return response()->json($result, 200);
    }

    /**
     * Create or Update a charity
     *
     * @param App\Http\Requests\Account\CreateOrUpdateCharityRequest $request
     * @param App\Services\CharityService $charityService
     * @return \Illuminate\Http\Response
     */
    public function createOrUpdateCharity(CreateOrUpdateCharityRequest $request, CharityService $charityService)
    {
        $result = new CharityResource($charityService->createOrUpdateCharity($request->all()));

        return response()->json($result, 200);
    }

    /**
     * Delete a charity
     *
     * @param integer $charityId
     * @return \Illuminate\Http\Response
     */
    public function deleteCharity($charityId, CharityService $charityService)
    {
        $result = $charityService->deleteCharity($charityId);

        return response()->json($result, 200);
    }

    /**
     * Get charity details
     *
     * @param integer $charityId
     * @param \App\Services\CharityService $charityService
     * @return \Illuminate\Http\Response
     */
    public function charityDetails($charityId, CharityService $charityService)
    {
        $result = new CharityResource($charityService->getCharityById($charityId));

        return response()->json($result, 200);
    }

    /**
     * Get all events
     *
     * @param App\Services\EventService $eventService
     * @return \Illuminate\Http\Response
     */
    public function events(EventService $eventService)
    {
        $result = new EventCollection($eventService->getAllEvents());

        return response()->json($result, 200);
    }

    /**
     * Create or Update an event
     *
     * @param App\Http\Requests\Event\CreateOrUpdateEventRequest $request
     * @param App\Services\EventService $eventService
     * @return \Illuminate\Http\Response
     */
    public function createOrUpdateEvent(CreateOrUpdateEventRequest $request, EventService $eventService)
    {
        $result = new EventResource($eventService->createOrUpdateEvent($request->all()));

        return response()->json($result, 200);
    }

    /**
     * Delete an event
     *
     * @param integer $eventId
     * @param App\Services\EventService $eventService
     * @return \Illuminate\Http\Response
     */
    public function deleteEvent($eventId, EventService $eventService)
    {
        $result = $eventService->deleteEvent($eventId);

        return response()->json($result, 200);
    }

    /**
     * Register an event
     *
     * @param App\Http\Requests\Event\RegisterEventRequest $request
     * @param App\Services\EventService $eventService
     * @return App\Services\EventService $eventService
     */
    public function registerEvent(RegisterEventRequest $request, EventService $eventService)
    {
        $result = $eventService->registerEvent($request->all());

        return response()->json($result, 200);
    }

    /**
     * Get event details
     *
     * @param integer $eventId
     * @param \App\Services\EventService $eventService
     * @return \Illuminate\Http\Response
     */
    public function eventDetails($eventId, EventService $eventService)
    {
        $result = new EventResource($eventService->getEventById($eventId));

        return response()->json($result, 200);
    }

    /**
     * Get all users belong the account
     *
     * @param integer $accountId
     * @param App\Services\UserService $userService
     * @return \Illuminate\Http\Response
     */
    public function usersWithAccountId($accountId, UserService $userService)
    {
        $result = new UserCollection($userService->usersWithAccountId($accountId));

        return response()->json($result, 200);
    }

    /**
     * Get all users
     *
     * @param App\Http\Requests\User\GetAllUsersRequest $request
     * @param App\Services\UserService $userService
     * @return \Illuminate\Http\Response
     */
    public function users(GetAllUsersRequest $request, UserService $userService)
    {
        $search = $request->query('search');
        $result = new UserCollection($userService->users($search));

        return response()->json($result, 200);
    }

    /**
     * Create a user belongs to the account
     *
     * @param App\Http\Requests\User\CreateOrUpdateUserUnderAccountRequest $request
     * @param App\Services\UserService $userService
     * @return \Illuminate\Http\Response
     */
    public function createOrUpdateUserUnderAccount(CreateOrUpdateUserUnderAccountRequest $request, UserService $userService)
    {
        $result = new UserResource($userService->createOrUpdateUserUnderAccount($request->all()));

        return response()->json($result, 200);
    }

    /**
     * Create a user
     *
     * @param App\Http\Requests\User\CreateOrUpdateUserRequest $request
     * @param App\Services\UserService $userService
     * @return \Illuminate\Http\Response
     */
    public function createOrUpdateUser(CreateOrUpdateUserRequest $request, UserService $userService)
    {
        $result = new UserResource($userService->createOrUpdateUser($request->all()));

        return response()->json($result, 200);
    }

    /**
     * Delete a user
     *
     * @param integer $userId
     * @param App\Services\UserService $userService
     * @return \Illuminate\Http\Response
     */
    public function deleteUser($userId, UserService $userService)
    {
        $result = $userService->deleteUser($userId);

        return response()->json($result, 200);
    }

    /**
     * Get a user relations info (Accounts, Charities, Events)
     * or all Accounts, Charities, Events, Users if user is admin
     *
     * @param integer $userId
     * @param App\Services\UserService $userService
     * @return \Illuminate\Http\Response
     */
    public function dashboardAchievements($userId, UserService $userService)
    {
        $result = $userService->getDashboardAchievements($userId);
        return response()->json($result, 200);
    }

    /**
     * Get all products
     *
     * @param App\Services\ProductService $productService
     * @return \Illuminate\Http\Response
     */
    public function products(ProductService $productService)
    {
        $result = new ProductCollection($productService->getAllProducts());

        return response()->json($result, 200);
    }

    /**
     * Create or Update a product
     *
     * @param App\Http\Requests\Account\CreateOrUpdateProductRequest $request
     * @param App\Services\ProductService $productService
     * @return \Illuminate\Http\Response
     */
    public function createOrUpdateProduct(CreateOrUpdateProductRequest $request, ProductService $productService)
    {
        $result = new ProductResource($productService->createOrUpdateProduct($request->all()));

        return response()->json($result, 200);
    }

    /**
     * Delete a product
     *
     * @param integer $productId
     * @return \Illuminate\Http\Response
     */
    public function deleteProduct($productId, ProductService $productService)
    {
        $result = $productService->deleteProduct($productId);

        return response()->json($result, 200);
    }

    /**
     * Add a product to a category
     *
     * @param integer $productId
     * @param integer $categoryId
     * @return \Illuminate\Http\Response
     */
    public function addProductToCategory($productId, $categoryId, ProductService $productService)
    {
        $result = $productService->addProductToCategory($productId, $categoryId);

        return response()->json($result, 200);
    }

    /**
     * Delete a product from a category
     *
     * @param integer $productId
     * @param integer $categoryId
     * @return \Illuminate\Http\Response
     */
    public function deleteProductFromCategory($productId, $categoryId, ProductService $productService)
    {
        $result = $productService->deleteProductFromCategory($productId, $categoryId);

        return response()->json($result, 200);
    }

    /**
     * Add a product to a size
     *
     * @param App\Http\Requests\Product\AddProductToSizeRequest $request
     * @param integer $productId
     * @param integer $sizeId
     * @return \Illuminate\Http\Response
     */
    public function addProductToSize(AddProductToSizeRequest $request, $productId, $sizeId, ProductService $productService)
    {
        $quantity = $request->query('quantity', 1);
        $result = $productService->addProductToSize($productId, $categoryId, $quantity);

        return response()->json($result, 200);
    }

    /**
     * Delete a product from a size
     *
     * @param integer $productId
     * @param integer $sizeId
     * @return \Illuminate\Http\Response
     */
    public function deleteProductFromSize($productId, $sizeId, ProductService $productService)
    {
        $result = $productService->deleteProductFromSize($productId, $sizeId);

        return response()->json($result, 200);
    }

    /**
     * Get all locations
     *
     * @param App\Services\LocationService $locationService
     * @return \Illuminate\Http\Response
     */
    public function locations(LocationService $locationService)
    {
        $result = new LocationCollection($locationService->getAllLocations());

        return response()->json($result, 200);
    }

    /**
     * Create or Update a location
     *
     * @param App\Http\Requests\Location\CreateOrUpdateLocationRequest $request
     * @param App\Services\LocationService $locationService
     * @return \Illuminate\Http\Response
     */
    public function createOrUpdateLocation(CreateOrUpdateLocationRequest $request, LocationService $locationService)
    {
        $result = new LocationResource($locationService->createOrUpdateLocation($request->all()));

        return response()->json($result, 200);
    }

    /**
     * Create an address
     *
     * @param App\Http\Requests\Location\CreateAddressRequest $request
     * @param App\Services\LocationService $locationService
     * @return \Illuminate\Http\Response
     */
    public function createAddress(CreateAddressRequest $request, AddressService $addressService)
    {
        $result = new AddressResource($addressService->createAddress($request->all()));
        return response()->json($result, 200);
    }

    /**
     * Delete a location
     *
     * @param integer $locationId
     * @return \Illuminate\Http\Response
     */
    public function deleteLocation($locationId, LocationService $locationService)
    {
        $result = $locationService->deleteLocation($locationId);

        return response()->json($result, 200);
    }

    /**
     * Get all orders
     *
     * @param App\Services\OrderService $orderService
     * @return \Illuminate\Http\Response
     */
    public function orders(OrderService $orderService)
    {
        $result = new OrderCollection($orderService->getAllOrders());

        return response()->json($result, 200);
    }

    /**
     * Create or Update an order item
     *
     * @param App\Http\Requests\Order\CreateOrUpdateOrderItemRequest $request
     * @param App\Services\OrderService $orderService
     * @return \Illuminate\Http\Response
     */
    public function createOrUpdateOrderItem(CreateOrUpdateOrderItemRequest $request, OrderService $orderService)
    {
        $result = new OrderItemResource($orderService->createOrUpdateOrderItem($request->all()));

        return response()->json($result, 200);
    }

    /**
     * Update an order
     *
     * @param App\Http\Requests\Order\UpdateOrderRequest $request
     * @param App\Services\OrderService $orderService
     * @return \Illuminate\Http\Response
     */
    public function updateOrder(UpdateOrderRequest $request, OrderService $orderService)
    {
        $result = new OrderResource($orderService->updateOrder($request->all()));

        return response()->json($result, 200);
    }

    /**
     * Place an order
     *
     * @param App\Http\Requests\Order\PlaceOrderRequest $request
     * @param App\Services\OrderService $orderService
     * @return \Illuminate\Http\Response
     */
    public function placeOrder(PlaceOrderRequest $request, OrderService $orderService)
    {
        $result = new OrderResource($orderService->placeOrder($request->all()));

        return response()->json($result, 200);
    }

    /**
     * Get lowest rate
     *
     * @param integer $orderId
     * @param App\Services\OrderService $orderService
     * @param Illuminate\Http\Request $request
     * @param App\Services\ShippingService $shippingService
     * @return \Illuminate\Http\Response
     */
    public function getLowestCarrierRate($orderId, OrderService $orderService, Request $request, ShippingService $shippingService)
    {
        $totalWeight = $orderService->getTotalWeightItemsInOrder($orderId);
        $shippingMethod = $request->shipping_method ?? null;
        $result = $shippingService->chooseLowestRateFromCarriers($orderId, $totalWeight, $shippingMethod);

        return response()->json(['carrier' => $result->carrier, 'service' => $result->service, 'rate' => $result->rate], 200);

    }

    /**
     * Create a billing
     *
     * @param App\Http\Requests\Billing\CreateBillingRequest $request
     * @param App\Services\BillingService $billingService
     * @return \Illuminate\Http\Response
     */
    public function createBilling(CreateBillingRequest $request, BillingService $billingService)
    {
        $result = new BillingResource($billingService->createBilling($request->all()));

        return response()->json($result, 200);
    }

    /**
     * Get all billings belong to an account
     *
     * @param integer $accountId
     * @param App\Services\BillingService $billingService
     * @return \Illuminate\Http\Response
     */
    public function getBillingsWithAccountId(Integer $accountId, BillingService $billingService)
    {
        $result = new BillingCollection($billingService->getBillingsWithAccountId($accountId));
    }

    /**
     * Get all billings belong to a user
     *
     * @param integer $userId
     * @param App\Services\BillingService $billingService
     * @return \Illuminate\Http\Response
     */
    public function getBillingsWithUserId(Integer $userId, BillingService $billingService)
    {
        $result = new BillingCollection($billingService->getBillingsWithUserId($userId));
    }

    /**
     * Get all designs
     *
     * @param App\Services\DesignService $designService
     * @return \Illuminate\Http\Response
     */
    public function designs(DesignService $designService)
    {
        $result = new DesignCollection($designService->getAllDesigns());

        return response()->json($result, 200);
    }

    /**
     * Create or Update a design
     *
     * @param App\Http\Requests\Order\CreateOrUpdateDesignRequest $request
     * @param App\Services\DesignService $designService
     * @return \Illuminate\Http\Response
     */
    public function createOrUpdateDesign(CreateOrUpdateDesignRequest $request, DesignService $designService)
    {
        $result = new DesignResource($designService->createOrUpdateDesign($request->all()));

        return response()->json($result, 200);
    }

    /**
     * Delete a design
     *
     * @param integer $designId
     * @param App\Services\DesignService $designService
     * @return \Illuminate\Http\Response
     */
    public function deleteDesign($designId, DesignService $designService)
    {
        $result = $designService->deleteDesign($designId);

        return response()->json($result, 200);
    }

    /**
     * Upload a design file to AWS S3
     *
     * @param App\Http\Requests\Design\UploadDesignFileRequest $request
     * @param App\Services\ExtraService $extraService
     * @return \Illuminate\Http\Response
     */
    public function uploadDesignFile(UploadDesignFileRequest $request, ExtraService $extraService)
    {
        $result = $extraService->uploadDesignFile($request->all());

        return response()->json(['url' => $result], 200);
    }

    /**
     * Upload an image to AWS S3
     *
     * @param App\Http\Requests\UploadImageRequest $request
     * @param App\Services\ExtraService $extraService
     * @return \Illuminate\Http\Response
     */
    public function uploadImage(UploadImageRequest $request, ExtraService $extraService)
    {
        $result = $extraService->uploadImage($request->all());

        return response()->json(['url' => $result], 200);
    }

}
