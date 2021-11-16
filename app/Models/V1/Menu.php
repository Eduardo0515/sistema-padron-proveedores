<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Menu extends Model
{
    //
    protected $table = 'tbl_menus';

    public function getChildren($data, $line)
    {
        //dd($data);
        $children = [];
        foreach ($data as $line1) {
            if ($line['id'] == $line1['parentid']) {
                $children = array_merge($children, [ array_merge($line1, ['submenu' => $this->getChildren($data, $line1) ]) ]);
            }
        }
        return $children;
    }
    public function optionsMenu()
    {
        return $this->join('users_menus AS UM', 'tbl_menus.id', '=', 'UM.menu_id')->where('tbl_menus.estatus', 1)->where('UM.user_id', Auth::user()->id)
            ->orderby('tbl_menus.parentid')
            ->orderby('tbl_menus.orden')
            ->orderby('tbl_menus.menu')
            ->get()
            ->toArray();
    }
    public static function menus()
    {
        $menus = new Menu();
        $data = $menus->optionsMenu();
        $menuAll = [];
        foreach ($data as $line) {
            $item = [ array_merge($line, ['submenu' => $menus->getChildren($data, $line) ]) ];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menus->menuAll = $menuAll;
    }
}
