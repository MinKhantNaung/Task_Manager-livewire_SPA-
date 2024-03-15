<?php

namespace App\Livewire\Images;

use App\Models\Image;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\LivewireHelper;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;

class ImageIndex extends Component
{
    use WithFileUploads;

    #[Validate('required')]
    #[Validate(['photos.*' => 'image|mimes:png,jpg,jpeg,svg,webp'])]
    public $photos = []; // don't forget to set [] to variable when you upload multiple files.

    public function save()
    {
        $this->validate();

        if (!is_null($this->photos)) {
            foreach ($this->photos as $photo) {
                $image_name = uniqid() . '_' . $photo->getClientOriginalName();
                $path = $photo->storeAs('images', $image_name, 'public');

                Image::create([
                    'name' => $image_name,
                    'path' => $path,
                ]);
            }
        }

        $this->reset();
        unset($this->photos);

        session()->flash('success', 'Image uploaded successfully !');
    }

    public function clearSession()
    {
        (new LivewireHelper)->clearSession();
    }

    #[Computed]
    public function images()
    {
        return Image::orderBy('id', 'desc')
            ->get();
    }

    public function download(Image $image)
    {
        return response()->download(public_path("storage/$image->path"), 'image.webp');
    }

    public function render()
    {
        return view('livewire.images.image-index');
    }
}
