<?php


namespace Tests\Endpoints;


use App\Helpers;
use App\Models\Item;

class CreateFormStatusTest extends ItemTestCase
{
    /**
     * 1. Sprawdzenie czy endpoint zwraca status 201.
     * 2. Sprawdzenie czy endpoint zwraca status 400 jeżeli status jest pustym stringiem.
     * 3. Sprawdzenie czy endpoint zwraca status 400 jeżeli status z poza dopuszczalnego zakresu.
     * 4. Sprawdzenie czy endpoint zwraca status 400 jeżeli name jest pustym stringiem.
     * 5. Sprawdzenie czy endpoint zwraca status 400 jeżeli amount jest pustym stringiem.
     * 6. Sprawdzenie czy endpoint zwraca status 400 jeżeli amount jest znakiem alfabetycznym.
     * 7. Sprawdzenie czy endpoint zwraca status 400 jeżeli amount = 0.
     * 8. Sprawdzenie czy endpoint zwraca status 400 jeżeli większe od 999.
     */

    /**
     * 1. Test if endpoint return status 201.
     *
     * @test
     * @return void
     */
    public function correct_response_status()
    {
        $this->post($this->url, $this->data)->assertResponseStatus(201);
    }

    /**
     * 2. Test if endpoint return status 400 when status is empty string.
     *
     * @test
     * @return void
     */
    public function bad_request_status_when_empty_status()
    {
        $this->data['status'] = '';
        $this->post($this->url, $this->data)->assertResponseStatus(400);
    }

    /**
     * 3. Test if endpoint return status 400 when status out of range.
     *
     * @test
     * @return void
     */
    public function bad_request_status_when_status_out_of_range()
    {
        $this->data['status'] = 'recovered';
        $this->post($this->url, $this->data)->assertResponseStatus(400);
    }

    /**
     * 4. Test if endpoint return status 400 when name is an empty string.
     *
     * @test
     * @return void
     */
    public function bad_request_status_when_empty_name()
    {
        $this->data['name'] = '';
        $this->post($this->url, $this->data)->assertResponseStatus(400);
    }

    /**
     * 5. Test if endpoint return status 400 when amount is an empty string.
     *
     * @test
     * @return void
     */
    public function bad_request_status_when_amount_is_empty()
    {
        $this->data['amount'] = '';
        $this->post($this->url, $this->data)->assertResponseStatus(400);
    }

    /**
     * 6. Test if endpoint return status 400 when when amount is char.
     *
     * @test
     * @return void
     */
    public function bad_request_status_when_session_id_less_then_thirteen_chars()
    {
        $this->data['amount'] = 'a';
        $this->post($this->url, $this->data)->assertResponseStatus(400);
    }

    /**
     * 7. Test if endpoint return status 400 when amount is 0.
     *
     * @test
     * @return void
     */
    public function bad_request_status_when_amount_if_zero()
    {
        $this->data['amount'] = 0;
        $this->post($this->url, $this->data)->assertResponseStatus(400);
    }

    /**
     * 8. Test if endpoint return status 400 when amount is over 999.
     *
     * @test
     * @return void
     */
    public function bad_request_status_when_amount_over_max_range()
    {
        $this->data['amount'] = 1111;
        $this->post($this->url, $this->data)->assertResponseStatus(400);
    }
}
