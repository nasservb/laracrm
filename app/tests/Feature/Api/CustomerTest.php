<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Database\Factories\CustomerFactory;
use Database\Factories\UserFactory;
use App\Domains\Customer\Models\Customer;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function setup(): void
    {
        parent::setUp();
        $user = (new UserFactory())->create();
        $this->actingAs($user);
    }

    /**
     * @test
     * @dataProvider createValidationData
     */
    public function ItShouldBeAcceptValidDataForCreate($data, $responseMessage, $responseCode)
    {
        $response = $this->postJson(route('api.customer.create'), [
            'firstName' =>$data[0],
            'lastName' =>$data[1],
            'phone' =>$data[2],
            'email' =>$data[3],
            'desiredBudget' =>$data[4],
            'message' =>$data[5],
        ]);
        $response->assertStatus($responseCode);
        //$response->assertSeeText($responseMessage);
    }

    /**
     * provide test data for create and edit validation
     *
     * @return array[]
     */
    public function createValidationData(): array
    {
        $this->refreshApplication();
        $this->setUpFaker();
        return [
            [['nasser','','','nasservb@gmail.com',10000,''],'ok',201],
            [['','','','nasservb@gmail.com',10000,''],'',422],
            [['nasser','','','',10000,''],'',422],
            [['nasser','','+989189151266','',10000,''],'',201],
            [['','niazy','+989189151266','',10000,''],'',201],
            [['na','ni','+989189151266','',10000,''],'',422],
            [['nasser','','+989189151266','',-10,''],'',422],
            [['nasser','','+989189151266','','',''],'',422],
            [['nasser','','+989189151266','',100,$this->faker->text(500)],'',201],
            [['nasser','','+989189151266','',100,$this->faker->text(1200)],'',422],
            ];
    }

    /**
     * @test
     */
    public function ItCanBeAddItemToDatabaseAfterCreate()
    {

        $data = CustomerFactory::new()->definition();

        $response = $this->postJson(route('api.customer.create'), $data);
        $response->assertStatus(201);

        $this->assertDatabaseCount(Customer::class, 1);
    }

    /**
     * @test
     */
    public function ItCanShowAllItemWhenCallIndex()
    {
        (new CustomerFactory(100))->create();

        $response = $this->get(route('api.customer.index'));

        $response->assertStatus(200);
        $response->assertJsonStructure([
                'data' => [
                    [
                        'id',
                        'firstName' ,
                        'lastName' ,
                        'desiredBudget' ,
                        'website' ,
                        'message' ,
                    ]
                ],
                'links' => [
                    'first',
                    'last',
                    'prev',
                    'next'
                ],
                'meta' => [
                    'current_page',
                    'from',
                    'last_page',
                    'links',
                    'path',
                    'per_page',
                    'to',
                    'total',
                ]

        ]);

        $this->assertEquals(100, json_decode($response->getContent(), 1)['meta']['total']);
    }

    /**
     * @test
     */
    public function ItCanSeeItemDataAfterCallShow()
    {
        $item = (new CustomerFactory())->create();

        $response = $this->get(route('api.customer.show', $item->id));

        $response->assertStatus(200);
        $this->assertJson(json_encode([
            'id' => $item->id,
            'firstName' =>$item->firstName,
            'lastName' =>$item->lastName,
            'phone' =>$item->phone,
            'email' =>$item->email,
            'desiredBudget' =>$item->desiredBudget,
            'message' =>$item->message,
            'description' => $item->description,

        ]), $response->getContent());

        $response = $this->get(route('api.customer.show', $item->id + 1));

        $response->assertStatus(404);
    }

    /**
     * @test
     * @dataProvider editValidationData
     */
    public function ItShouldBeAcceptValidDataForEdit($title, $description, $responseCode)
    {
        $item = (new CustomerFactory())->create();
        $response = $this->put(route('api.customer.edit', $item->id), [
            'title' => $title,
            'description' => $description
        ]);
        $response->assertStatus($responseCode);
    }

    /**
     * provide test data for create and edit validation
     *
     * @return array[]
     */
    public function editValidationData(): array
    {
        $this->refreshApplication();
        $this->setUpFaker();
        return [
            ['title','description',200],
            ['','',302],
            ['t','',302],
            ['test','',200],
            ['a','a',302],
            [$this->faker->text(300),'',302],
            ['test',$this->faker->text(1500),302],
            [null,null,302],
            ['test',null,200]
        ];
    }

    /**
     * @test
     */
    public function ItCanBeEditItemAfterEdit()
    {
        $item = (new CustomerFactory())->create();

        $data = [
            'title' => $this->faker->name(),
            'description' => $this->faker->text()
        ];
        $response = $this->put(route('api.customer.edit', $item->id), $data);

        $response->assertStatus(200);

        $item->refresh();
        $this->assertEquals($item->title, $data['title']);
        $this->assertEquals($item->description, $data['description']);
    }


    /**
     * @test
     */
    public function ItCanBeDeleteItemAfterDelete()
    {
        $item = (new CustomerFactory())->create();

        $response = $this->delete(route('api.customer.delete', $item->id));

        $response->assertStatus(200);

        $this->assertDatabaseMissing(Website::class, [[
            'id' => $item->id,
            'title' => $item->title,
            'description' => $item->description,
        ]]);
    }
}
