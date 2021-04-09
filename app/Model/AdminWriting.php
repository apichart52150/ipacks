<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

/**
 * 
 */
class AdminWriting extends Model
{
	
	// query speaking status = wait
	public static function total_writing() {

		$total_writing = DB::table('text_result')
		->select('text_result.id', 'text_result.test_type', 'text_result.header_test', 'text_result.status', 'text_result.th_id', 'text_result.sent_date', 'text_result.due_date', 'student.std_name')
		->leftJoin('student', 'student.std_id', '=', 'text_result.std_id')
		->where('status', '=', 'N')
		->whereNull('th_id')
		->orderBy('sent_date', 'ASC')
		->get();

		return ($total_writing);
	}

	// query status = receive and auth = th_id
	public static function receive_writing() {

		$receive_writing = DB::table('text_result')
		->select('text_result.*','student.std_name')
		->leftjoin('student','student.std_id','=','text_result.std_id')
		->where('th_id', '=', Auth::user()->id)
		->whereIn('text_result.status', ['W', 'TH_S'])
		->orderBy('text_result.sent_date','desc')
		->get();

		return ($receive_writing);
	}

	// update status and th_id 
	// N = Sent
	// Y = Success
	// W | TH_S = Pending
	// ST_S = Work in progress 


	public static function receive($id) {
	
		$receive = DB::table('text_result')
		->where('id','=',$id)
		->update(['status' => 'W',
		'th_id' => Auth::user()->id]);

		return ($receive);
	}

	public static function check($id){

		$writing = DB::table('text_result')
			->select('text_result.*','student.std_name', 'course.coursename', 'users.name as teacher', 'class.th_name as th_inClass')
			->leftjoin('student','student.std_id','=','text_result.std_id')
			->join('class_student', 'text_result.std_id', '=', 'class_student.std_id')
			->join('class', 'class_student.nccode', '=', 'class.nccode')
        	->join('course','class.courseid','=','course.courseid')
        	->join('users', 'users.id', '=', 'text_result.th_id')
			->where('text_result.id','=', $id)
			->get();

            

		 	// dd($writing);

        
        if ($writing[0]->level == 0) {
			$img_path = "public/assets/images/fi-fx/{$writing[0]->code_test}.jpg";
		} else if ($writing[0]->level == 1){
			$img_path = "public/assets/images/ks-ix/{$writing[0]->code_test}.jpg";
		} else if ($writing[0]->level == 2) {
            $img_path = "public/assets/images/gt/{$writing[0]->code_test}.jpg";
        }

        $check = [
			'id' => $writing[0]->id,
			'targetbrand' => $writing[0]-> targetbrand,
			'img' => $img_path,
			'score' => $writing[0]->score,
			'comment' => $writing[0]->comment,
			'test_type' => $writing[0]->test_type,
			'code_test' => $writing[0]->code_test,
			'header_test' => $writing[0]->header_test,
			'level' => $writing[0]->level,
			'status' => $writing[0]->status,
			'th_id' => $writing[0]->th_id,
			'sent_date' => $writing[0]->sent_date,
			'std_id' => $writing[0]->std_id,
			'text' => $writing[0]->text,
			'th_text' => $writing[0]->th_text,
			'mode' => $writing[0]->mode,
			'coursename' => $writing[0]->coursename,
			'std_name' => $writing[0]->std_name,
			'th_name'=> $writing[0]->teacher
		];

		// dd($check);

		return ($check);
	}

	public static function check_submit(Request $request){

		if (empty($request->id)) {
            return 'Not found SAC id In table!';
        }

		if ($request->type == 'SAVE') {

			DB::beginTransaction();

            try {

                $check_submit = DB::table('text_result')
                    ->where('id','=', $request->input('id'))
                    ->update([
                        'status' => 'TH_S',
                        'th_sent_date' =>  date('Y-m-d H:i:s'),
                        'th_text' => $request->input('th_text'),
                        'score' => $request->input('score'),
                        'comment' => $request->input('comment')
                    ]);
				DB::commit();

                return  ($check_submit);

            } catch (\Exception $e) {

                DB::rollback();
                return 'Somrthing went wrong! Please contact administrator : ' . $e->getMessage();

            }

        } else if ($request->type == 'SUBMIT') {

            DB::beginTransaction();

            try {

                $check_submit = DB::table('text_result')
					->where('id','=', $request->input('id'))
                    ->update([
                        'status' => 'Y',
						'th_sent_date' =>  date('Y-m-d H:i:s'),
                        'th_text' => $request->input('th_text'),
                        'score' => $request->input('score'),
                        'comment' => $request->input('comment')
                    ]);
                DB::commit();

				return  ($check_submit);

            } catch (\Exception $e) {

                DB::rollback();
                return 'Somrthing went wrong! Please contact administrator : ' . $e->getMessage();

            }
        }
	}
}