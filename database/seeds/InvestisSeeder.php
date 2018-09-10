<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;
use \App\TypeEntity;

class InvestisSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){}

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $fields)
    {
      dd($type);
      $typeEntity = TypeEntity::where('name', $type->display_name_singular)->firstOrFail();

      if($fields->get('field') == 'type_entities_id'){
        $fields->transform(function($item,$key) use ($typeEntity){
          if($key == 'type'){
            return 'hidden';
          }
          if($key == 'details'){
            return json_encode(["default" => $typeEntity->id]);
          }
          return $item;
        });
      }


      return new DataRow($fields->put('data_type_id', $type->id)->toArray());
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
