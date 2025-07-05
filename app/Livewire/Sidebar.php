<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;

class Sidebar extends Component
{
    public $items = [];
    public $active = '';
    protected $listeners = ['notificationRead' => 'updateUnreadCount'];
    public $unreadNotif;

    public function updateUnreadCount()
    {
        $this->unreadNotif = Notification::where('user_id', Auth::user()->id)
                                        ->whereNull('read_at')
                                        ->count();
    }
    public function mount($items = [])
    {
        $this->updateUnreadCount();
        $this->items = $items;
        $this->active = $items[0]['label'] ?? '';
    }

    public function setActive($option)
    {
        $this->active = $option;
        $this->dispatch('setActive', $option);
    }
    public function render()
    {
        return view('livewire.sidebar');
    }
}
