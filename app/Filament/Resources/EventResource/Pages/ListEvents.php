<?php

namespace App\Filament\Resources\EventResource\Pages;

use App\Filament\Resources\EventResource;
use Filament\Actions;
use App\Models\Category;
use App\Models\User;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Pages\ListRecords;

class ListEvents extends ListRecords
{
    protected static string $resource = EventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        $tabs = [
            'all' => Tab::make(),
        ];

        $categories = Category::all();

        
        

        foreach ($categories as $category) {
            $tabs[$category->id] = Tab::make()->label($category->name)->modifyQueryUsing(function (Builder $query) use ($category) {
                return $query->where('category_id', $category->id);
            });
        }

        return $tabs;
    }
}
