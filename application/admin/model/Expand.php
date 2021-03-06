<?php

namespace app\admin\model;

use think\Model;

class Expand extends Model
{
    // 表名
    protected $name = 'expand';
    
    // 自动写入时间戳字段
    protected $autoWriteTimestamp = false;

    // 定义时间戳字段名
    protected $createTime = false;
    protected $updateTime = false;
    
    // 追加属性
    protected $append = [
        'semester_text'
    ];
    

    
    public function getSemesterList()
    {
        return ['1' => __('Semester 1'),'2' => __('Semester 2')];
    }


    public function getSemesterTextAttr($value, $data)
    {        
        $value = $value ? $value : (isset($data['semester']) ? $data['semester'] : '');
        $list = $this->getSemesterList();
        return isset($list[$value]) ? $list[$value] : '';
    }




    public function category()
    {
        return $this->belongsTo('ClassesCategory', 'ccid', 'ccid', [], 'LEFT')->setEagerlyType(0);
    }


    public function subject()
    {
        return $this->belongsTo('Subject', 'sid', 'sid', [], 'LEFT')->setEagerlyType(0);
    }


    public function teacher()
    {
        return $this->belongsTo('User', 'teacher_id', 'user_id', [], 'LEFT')->setEagerlyType(0);
    }


    public function student()
    {
        return $this->belongsTo('User', 'student_id', 'user_id', [], 'LEFT')->setEagerlyType(0);
    }
}
