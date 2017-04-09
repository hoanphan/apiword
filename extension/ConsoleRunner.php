<?php

namespace app\extension;
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;


/**
 * Created by PhpStorm.
 * User: hoandhtb
 * Date: 4/9/17
 * Time: 3:08 PM
 */
class ConsoleRunner extends Component
{
    /**
     * @var string Console application file that will be executed.
     * Usually it can be `yii` file.
     */
    public $file;
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

    }
    /**
     * Running console command on background
     *
     * @param string $cmd Argument that will be passed to console application
     * @return boolean
     */
    public function run($cmd)
    {
        $cmd = PHP_BINDIR . '/php ' . Yii::getAlias($this->file) . ' ' . $cmd;
        if ($this->isWindows() === true) {
            pclose(popen('start /b ' . $cmd, 'r'));
        } else {
            pclose(popen($cmd . ' > /dev/null &', 'r'));
        }
        return true;
    }
    /**
     * Check operating system
     *
     * @return boolean true if it's Windows OS
     */
    protected function isWindows()
    {
        if (PHP_OS == 'WINNT' || PHP_OS == 'WIN32') {
            return true;
        } else {
            return false;
        }
    }
}