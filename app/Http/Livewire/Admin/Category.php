<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{
    public $category, $name;

    protected $rules = [
        'category.name' => 'required',
    ];

    public function mount() {
        $this->category = new ModelsCategory();
    }

    public function render()
    {
        $categories = ModelsCategory::all();
        return view('livewire.admin.category', compact('categories'));
    }

    public function store() {
        $this->validate([
            'name' => 'required',
        ]);

        ModelsCategory::create([
            'name' => $this->name,
        ]);

        $this->reset('name');
    }

    public function edit(ModelsCategory $category) {
        $this->category = $category;
    }

    public function update() {
        $this->validate();

        $this->category->save();

        $this->category = new ModelsCategory();
    }

    public function destroy(ModelsCategory $category) {
        $category->delete();

        $this->category = new ModelsCategory();
    }

    public function cancel() {
        $this->category = new ModelsCategory();
    }
}
