<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Response;

class CreateAdminReviewRequest extends Request {

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
			'courseAdminComments'=>'required',
			'approved'=>'required',
		    
		];
	}

	public function forbiddenResponse()
    {
        return Response::make('Something went wrong!',403);
    }

}
