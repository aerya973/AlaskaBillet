<?php
class Model
{
    //$data IS ONE LINE OF REQUEST RESULT
    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    //RECOVER THE RESULT OF THE REQUEST AND AFFECT OBJECT VALUES
    public function hydrate(array $data)
    {
        //AFFECT VALUES 
        foreach ($data as $key => $value) {

            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
}
