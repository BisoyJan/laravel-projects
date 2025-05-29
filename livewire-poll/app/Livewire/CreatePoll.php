<?php

namespace App\Livewire;

use App\Models\Poll;
use Livewire\Component;

class CreatePoll extends Component
{
    public $title;
    public $options = ['First'];

    protected $rules = [
        'title' => 'required|min:3|max:255',
        'options' => 'required|array|min:1|max:10',
        'options.*' => 'required|min:1|max:255'
    ];

    protected $messages = [
        'title.required' => 'The poll title is required.',
        'title.min' => 'The poll title must be at least 3 characters.',
        'title.max' => 'The poll title cannot exceed 255 characters.',
        'options.required' => 'At least one option is required.',
        'options.array' => 'Options must be an array.',
        'options.min' => 'You must provide at least one option.',
        'options.max' => 'You cannot have more than 10 options.',
        'options.*' => 'The option can\'t be empty.',
        'options.*.min' => 'The option must be at least 1 character long.',
        'options.*.max' => 'The option cannot exceed 255 characters.'
    ];

    public function render()
    {
        return view('livewire.create-poll');
    }

    public function addOption()
    {
        $this->options[] = '';
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options); // Re-index the array
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createPoll()
    {
        $this->validate();

        Poll::create([
            'title' => $this->title
        ])->options()->createMany(
                collect($this->options)
                    ->map(fn($option) => ['name' => $option])
                    ->all()
            );

        // Alternatively, if you want to create options one by one:
        // $poll = Poll::create([
        //     'title' => $this->title
        // ]);

        // foreach ($this->options as $optionName) {
        //     $poll->options()->create([
        //         'name' => $optionName
        //     ]);
        // }

        $this->reset(['title', 'options']);

        $this->dispatch('pollCreated');
        //$this->
    }

    // public function mount()
    // {

    // }
}
