<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Exercise;

class ExerciseControllerTest extends TestCase
{
       use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index_exercise(){
        $item=Exercise::factory()->create();
        $response=$this->get("/api/v1/exercise");
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "name"=>$item->name,
            "email"=>$item->email,
            "profile"=>$item->profile
        ]);


    }

    public function test_store_exercise(){
        $data=[
            "name"=>"Exersise",
            "email"=>"eee@com",
            "profile"=>"eeeeeeeee"
        ];
        
        $response=$this->post("/api/v1/exercise",$data);
        $response->assertStatus(201);
        $response->assertJsonFragment($data);
        $this->assertDatabaseHas("exercises",$data);
    }

    public function test_show_exercise(){
        $item=Exercise::factory()->create();
        $response=$this->get("/api/v1/exercise".$item->id);
        $response->assertStatus(200);
        $response->assertJsonFragment([
            "name"=>$item->name,
            "email"=>$item->email,
            "profile"=>$item->profile
        ]);
    }

    public function test_update_exercise(){
        $item=Exercise::factory()->create();
        $data=[
            "name"=>"Exercise_update",
            "email"=>"Exercise_update@com",
            "profile"=>"update"
        ];
        $response=$this->put("/api/v1/exercise".$item->id,$data);
        $response->assertStatus(200);
        $response->assertDatabasehas("exercises",$data);



    }

    public function test_delete_exercise(){
        $item=Exercise::factory()->create();
        $response=$this->delete("/api/v1/exercise".$item->id);
        $response->assertStatus(200);
        $this->assertDeleted($item);
    }

        
}
