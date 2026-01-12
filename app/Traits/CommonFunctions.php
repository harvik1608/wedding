<?php
    namespace App\Traits;

    use Illuminate\Http\Request;
    use Illuminate\Support\Str;
    use App\Models\General_setting;

    trait CommonFunctions
    {
        public function format_date($date)
        {
            return date('d M, Y',strtotime($date));
        }

        public function format_time($time)
        {
            return date('h:i A',strtotime($time));
        }

        public function uploadImage(Request $request, $fieldName, $folder, $oldFile = null)
        {
            if ($request->hasFile($fieldName) && $request->file($fieldName)->isValid()) {
                $file = $request->file($fieldName);
                $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();

                $destination = public_path($folder);
                if (!file_exists($destination)) {
                    mkdir($destination, 0777, true);
                }
                $file->move($destination, $filename);

                if (!empty($oldFile) && file_exists($destination . '/' . $oldFile)) {
                    unlink($destination . '/' . $oldFile);
                }
                return $filename;
            }
            return $oldFile;
        }

        public function general_setting($key)
        {
            $row = General_setting::where('setting_key',$key)->first();
            if($row) {
                return $row['setting_val'];
            } else {
                return '';
            }
        }
    }
