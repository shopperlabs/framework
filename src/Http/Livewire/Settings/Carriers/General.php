<?php

namespace Shopper\Framework\Http\Livewire\Settings\Carriers;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Shopper\Framework\Models\Shop\Carrier;

class General extends Component
{
    use WithPagination, WithFileUploads;

    /**
     * Search word
     *
     * @var string
     */
    public $search = '';

    /**
     * Name of the carrier shiping method.
     *
     * @var string
     */
    public $name;

    /**
     * Carrier URL website, useful for documentation.
     *
     * @var string
     */
    public $linkUrl;

    /**
     * Description of the carrier shipping method.
     *
     * @var string
     */
    public $description;

    /**
     * Instructions to define how to use carrier shipping method.
     *
     * @var string
     */
    public $instructions;

    /**
     * Carrier shipping method ID for edition.
     *
     * @var int
     */
    public $carrierId;

    /**
     * Logo Attribute.
     *
     * @var mixed
     */
    public $logo;

    /**
     * Logo full url preview.
     *
     * @var string
     */
    public $logoUrl;

    /**
     * Launch component modal.
     *
     * @var bool
     */
    public $display = false;

    /**
     * Launch modale to create/update a new carrier shipping method.
     *
     * @return void
     */
    public function launchModale()
    {
        $this->display = true;
    }

    /**
     * Add a new entry of carrier shipping method in the storage.
     *
     * @return void
     */
    public function store()
    {
        $this->validate([
            'name' => 'required|unique:'. shopper_table('carriers'),
            'logo'  => 'nullable|image|max:1024'
        ]);

        $shippingMethod = Carrier::query()->create([
            'name' => $this->name,
            'link_url' => $this->linkUrl,
            'description' => $this->description,
            'instructions' => $this->instructions,
            'is_enabled' => true,
        ]);

        if ($this->logo) {
            $shippingMethod->update([
                'logo' => $this->logo->store('/', config('shopper.system.storage.disks.uploads'))
            ]);
        }

        $this->closeModal();

        $this->notify([
            'name' => __("Saved!"),
            'message' => __("Your carrier shipping method have been correctly added."),
        ]);
    }

    /**
     * Toggle carrier shipping method enable status.
     *
     * @param  int  $id
     * @param  int  $status
     * @return void
     */
    public function toggleStatus(int $id, int $status)
    {
        Carrier::query()->find($id)->update(['is_enabled' => $status === 1 ? false: true]);

        $this->dispatchBrowserEvent('toggle-saved-'. $id);

        $this->display = false;

        $this->notify([
            'name' => __("Update"),
            'message' => __("Your carrier shipping method status have been correctly updated."),
        ]);
    }

    /**
     * Display edition modal with full filled data.
     *
     * @param  int  $id
     * @return void
     */
    public function modalEdit(int $id)
    {
        $shippingMethod = Carrier::query()->find($id);

        $this->carrierId = $id;
        $this->name = $shippingMethod->name;
        $this->description = $shippingMethod->description;
        $this->linkUrl = $shippingMethod->link_url;
        $this->instructions = $shippingMethod->instructions;
        $this->logoUrl = $shippingMethod->logo_url;

        $this->display = true;
        $this->dispatchBrowserEvent('item-update');
    }

    /**
     * Close Modal.
     *
     * @return void
     */
    public function closeModal()
    {
        $this->display = false;

        $this->resetFields();
    }

    /**
     * Update the current Carrier on the modal.
     *
     * @return void
     */
    public function updateShippingMethod()
    {
        $this->validate([
            'name' => [
                'required',
                Rule::unique(shopper_table('carriers'), 'name')->ignore($this->carrierId)
            ],
            'logo'  => 'nullable|image|max:1024'
        ]);

        $shippingMethod = Carrier::query()->find($this->carrierId);

        $shippingMethod->update([
            'name' => $this->name,
            'link_url' => $this->linkUrl,
            'description' => $this->description,
            'instructions' => $this->instructions,
        ]);

        if ($this->logo) {
            $shippingMethod->update([
                'logo' => $this->logo->store('/', config('shopper.system.storage.disks.uploads'))
            ]);
        }

        $this->closeModal();

        $this->notify([
            'name' => __("Update"),
            'message' => __("Your carrier shipping method have been correctly updated."),
        ]);
    }

    /**
     * Removed item from the storage.
     *
     * @param  int  $id
     * @throws \Exception
     */
    public function removeCarrier(int $id)
    {
        Carrier::query()->find($id)->delete();

        $this->dispatchBrowserEvent('item-update');

        $this->notify([
            'name' => __("Deleted"),
            'message' => __("Your carrier shipping method have been correctly removed."),
        ]);
    }

    /**
     * Reset Components Form Fields.
     *
     * @return void
     */
    private function resetFields()
    {
        $this->carrierId = null;
        $this->name = '';
        $this->linkUrl = '';
        $this->description = '';
        $this->instructions = '';
        $this->enabled = false;
        $this->logoUrl = null;
        $this->logo = null;
    }

    /**
     * Renter component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('shopper::livewire.settings.carriers.general', [
            'carriers' => Carrier::query()
                ->where('name', 'like', '%'. $this->search .'%')
                ->where('slug', '<>', 'dhl')
                ->orderByDesc('name')
                ->paginate(6)
        ]);
    }
}
