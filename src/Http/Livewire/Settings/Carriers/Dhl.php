<?php

namespace Shopper\Framework\Http\Livewire\Settings\Carriers;

use Illuminate\Support\Facades\Artisan;
use Livewire\Component;
use Shopper\Framework\Models\System\Setting;
use Shopper\Framework\Models\Shop\Carrier;

class DHL extends Component
{
    /**
     * DHL API account id.
     *
     * @var string
     */
    public $dhl_account_id;

    /**
     * DHL API account username.
     *
     * @var string
     */
    public $dhl_account_username;

    /**
     * DHL API account password.
     *
     * @var string
     */
    public $dhl_account_password;

    /**
     * DHL Mode.
     *
     * @var string
     */
    public $dhl_mode;

    /**
     * Indicates if DHL Shipping method is being enabled.
     *
     * @var bool
     */
    public $enabled = false;

    /**
     * Message display during DHL installation.
     *
     * @var string
     */
    public $message = '...';

    /**
     * Confirm if install DHL using composer.
     *
     * @var bool
     */
    public $confirmInstallation = false;

    /**
     * Mounted component.
     *
     * @return void
     */
    public function mount()
    {
        $this->enabled = ($dhl = Carrier::query()->where('slug', 'dhl')->first()) ? $dhl->is_enabled : false;
        $this->dhl_mode = env('DHL_MODE', 'sandbox');
        $this->dhl_account_id = env('DHL_ACCOUNT_ID', '');
        $this->dhl_account_username = env('DHL_ACCOUNT_USERNAME', '');
        $this->dhl_account_password = env('DHL_ACCOUNT_PASSWORD', '');
    }

    /**
     * Enabled DHL payment.
     *
     * @return void
     */
    public function enableDHL()
    {
        Carrier::query()->create([
            'name' => 'DHL',
            'link_url' => 'https://www.dhl.com/global-en/home.html',
            'is_enabled' => true,
            'description' => "DHL International GmbH (DHL) is a German international courier, package delivery and express mail service."
        ]);

        $this->enabled = true;

        $this->notify([
            'title' => __("Success"),
            'message' => __("You have successfully enabled DHL shipping method for your shop!"),
        ]);
    }

    /**
     * Close Installation Modal.
     *
     * @return void
     */
    public function closeModal()
    {
        $this->confirmInstallation = false;
    }

    /**
     * Stripe installation process using composer.
     *
     * @return void
     */
    public function install()
    {
        $this->message = __('This feature is not enabled for now :(');

        $this->closeModal();
    }

    /**
     * Updated Stripe payment.
     *
     * @return void
     */
    public function store()
    {
        setEnvironmentValue([
            'dhl_mode'              => $this->dhl_mode,
            'dhl_account_id'        => $this->dhl_account_id,
            'dhl_account_username'  => $this->dhl_account_username,
            'dhl_account_password'  => $this->dhl_account_password,
        ]);

        Artisan::call('config:clear');

        $this->notify([
            'title' => __('Updated'),
            'message' => __("Your Stripe payments configuration have been correctly updated!")
        ]);
    }

    /**
     * Renter component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('shopper::livewire.settings.carriers.dhl');
    }
}
