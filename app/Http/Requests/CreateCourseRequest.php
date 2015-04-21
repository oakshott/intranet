<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateCourseRequest extends Request {

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
		$dateFromForm = Request::input('startDate');

		return [
		'courseTelephone'=>array('regex:/^(((\+44\s?\d{4}|\(?0\d{4}\)?)\s?\d{3}\s?\d{3})|((\+44\s?\d{3}|\(?0\d{3}\)?)\s?\d{3}\s?\d{4})|((\+44\s?\d{2}|\(?0\d{2}\)?)\s?\d{4}\s?\d{4}))(\s?\#(\d{4}|\d{3}))?$/'),
			'courseTitle' =>'required',
			'courseProvider' =>'required',
			'courseVenue' =>'required',
			'courseEmail'=>'required|email',
			'courseContact'=>'required',
			'courseNumber'=>'required',
			'startDate'=>'required|date',
			'endDate'=>'required|date|after:'.$dateFromForm,
			'duration'=>'required',
			'details'=>'required',
			'courseObjectives'=>'required',
			'courseFees'=>'required',
			'travelFees'=>'required',
			'deadline'=>'required|date|before:'.$dateFromForm,
			'lineManager'=>'required',
			'standards'=>'required',
		];
	}

	public function messages()
{
    return [
        'endDate.after'=>'End Date must be before start date.',
        'deadline.before'=>'Course Approval deadline must be before start date.',

    ];
}

}
