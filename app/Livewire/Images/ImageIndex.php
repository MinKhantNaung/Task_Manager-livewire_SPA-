<?php

namespace App\Livewire\Images;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\LivewireHelper;
use Livewire\Attributes\Validate;

class ImageIndex extends Component
{
    use WithFileUploads;

    #[Validate('required|mimes:png,jpg,jpeg,svg,webp')]
    public $photo;

    public function save()
    {
        $this->validate();
        $image_name = uniqid() . '_' . $this->photo->getClientOriginalName();
        $path = $this->photo->storeAs('images', $image_name, 'public');

        Image::create([
            'name' => $image_name,
            'path' => $path,
        ]);
        $this->reset();

        session()->flash('success', 'Image uploaded successfully !');
    }

    public function clearSession()
    {
        (new LivewireHelper)->clearSession();
    }

    public function render()
    {
        return view('livewire.images.image-index');
    }
}
