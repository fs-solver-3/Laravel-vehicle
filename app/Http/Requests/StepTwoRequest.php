<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StepTwoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'price_per_seat' => 'required|numeric|min:1|max:500',
            'enroute_price_per_seat' => 'array',
            'enroute_price_per_seat.*' => 'required|numeric|min:1|max:500',
            'seats_offered' => 'required|numeric|min:1|max:3'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'seats_offered' => 'number of seats',
        ];
    }

    public function messages()
    {
        $messages = [];

        $messages = $this->setPricePerSetMessage($messages);

        $messages = $this->setEnroutePricePerSeatMessage($messages);

        return $messages;
    }

    /**
     * @param array $messages
     *
     * @return mixed
     */
    private function setPricePerSetMessage($messages)
    {
        $ride = request()->session()->get('ride');

        $messages['price_per_seat.required'] =
            "The price from {$ride->sourceCity->name} to {$ride->destinationCity->name} is required.";

        $messages['price_per_seat.min'] =
            "The price from {$ride->sourceCity->name} to {$ride->destinationCity->name} must be real value.";

        $messages['price_per_seat.max'] =
            "The price from {$ride->sourceCity->name} to {$ride->destinationCity->name} must be real value.";

        return $messages;
    }

    /**
     * @param array $messages
     *
     * @return mixed
     */
    private function setEnroutePricePerSeatMessage($messages)
    {
        if ($this->request->get('enroute_price_per_seat') && is_array($this->request->get('enroute_price_per_seat'))) {

            foreach ($this->request->get('enroute_price_per_seat') as $key => $val) {

                $messages['enroute_price_per_seat.array'] = "The price for enroute cities must be an array.";

                $messages['enroute_price_per_seat.' . $key . '.required'] = "The price to {$key} is required.";

                $messages['enroute_price_per_seat.' . $key . '.min'] = "The price to {$key} must be real value.";

                $messages['enroute_price_per_seat.' . $key . '.max'] = "The price to {$key} must be real value.";
            }

        }

        return $messages;
    }
}
