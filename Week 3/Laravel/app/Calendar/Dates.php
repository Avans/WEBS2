<?php
namespace App\Calendar;

class Dates implements \Iterator {

    private $month;
    private $days;

    private $offsetAtStart;

    private $currentEntry;
    private $totalEntries;

    public function __construct(Month $month, $days)
    {
        $this->month = $month;
        $this->days = $days;

        $this->offsetAtStart = $month->calculateOffsetAtStart($days);
        $this->rewind();
        $this->totalEntries = (count($days) * $month->calculateNumberOfWeeks($days));
    }

    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        $day_count = $this->currentEntry - $this->offsetAtStart + 1;
        if ($this->currentEntry < $this->offsetAtStart) {
            return 'empty';
        } elseif ($this->month->beyondEndOfMonth($day_count)) {
            return 'empty';
        } else {
            return [
                'weekday' => $this->currentEntry % count($this->days),
                'weekday_class' => call_user_func(function($dayName){
                    switch ($dayName) {
                        case "Sat":
                            return "saturday_entry";
                        case "Sun":
                            return "sunday_entry";
                        default:
                            return "";
                    }
                }, $this->days[$this->currentEntry % count($this->days)]),
                'monthday' =>  $day_count,
            ];
        }
    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        $this->currentEntry++;
    }

    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        return $this->currentEntry;
    }

    public function valid()
    {
        return $this->currentEntry < $this->totalEntries;
    }

    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        $this->currentEntry = 0;
    }
}