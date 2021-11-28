<?php


namespace App\Classes\Todo;


use App\Models\Todo;

class GetTodo extends Todo
{
    protected  $user_id;
    protected  $initial_query;
    protected $table = 'todos';

    /**
     * @param $user_id
     * @return GetTodo
     */
    public static function newByUserId($user_id)
    {
        $instance = new self();
        $instance->setUserId($user_id);
        $instance->setInitialQuery($user_id);
        return $instance;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->initial_query->get();
    }

    /**
     * @param $year
     * @return mixed
     */
    public function getByYear($year)
    {
        return $this->initial_query->whereYear('date_time',$year)->get();
    }

    /**
     * @param $year
     * @param $month
     * @return mixed
     */
    public function getByYearMonth($year, $month)
    {
        return $this->initial_query->whereYear('date_time',$year)->whereMonth('date_time',$month)->get();
    }

    /**
     * @param $year
     * @param $month
     * @param $day
     * @return mixed
     */
    public function getByYearMonthDay($year, $month, $day)
    {
        return $this->initial_query->whereYear('date_time',$year)->whereMonth('date_time',$month)->whereDay('date_time',$day)->get();
    }

    /**
     * @param $category_id
     * @return mixed
     */
    public function getByCategoryId($category_id)
    {
        return $this->initial_query->whereCategoryId($category_id)->get();
    }

    /**
     * @param $status
     * @return mixed
     */
    public function getByStatus($status)
    {
        return $this->initial_query->whereStatus($status)->get();
    }

    /**
     * @param $category_id
     * @param $status
     * @return mixed
     */
    public function GetByCategoryStatus($category_id, $status)
    {
        return $this->initial_query->whereCategoryId($category_id)->whereStatus($status)->get();
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

    /**
     * @param mixed $initial_query
     */
    public function setInitialQuery($initial_query): void
    {
        $this->initial_query = Todo::with('category')->where('user_id',$this->user_id);
    }

}
