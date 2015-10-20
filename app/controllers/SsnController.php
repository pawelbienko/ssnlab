<?php


ini_set('display_errors', true);
error_reporting(E_ALL + E_NOTICE);

class SsnController extends BaseController {

    public function index() {
        $maindir = dirname(dirname(dirname(__FILE__)));
        $headtpl = $maindir.DS.'app'.DS.'templates'.DS.'ssn'.DS.'head.tpl';
        $footertpl = $maindir.DS.'app'.DS.'templates'.DS.'ssn'.DS.'footer.tpl';
        $assetsdir = $maindir.DS.'assets'.DS;
        $assetsdir = array('headtpl'     => $headtpl,
                           'footertpl'   => $footertpl
                    );
        return View::make('ssn/ssn.tpl', $assetsdir);
    }

    public function ssn() {

        $learnData = $_POST['arr'];
        foreach ($learnData as $key => $value) {
            foreach ($value as $k => $v) {
                if (!is_numeric($v) or $v > 1 or $v < 0) {
                    return false;
                }
            }
        }

        $testData = $_POST['tarr'];
        foreach ($testData as $key => $value) {
            foreach ($value as $k => $v) {
                if (!is_numeric($v) or $v > 1 or $v < 0) {
                    return false;
                }
            }
        }


        $alpha = $_POST['alfa'];
        if (!is_numeric($alpha) or $alpha > 1 or $alpha < 0) {
            return false;
        }
        $beta = $_POST['beta'];
        if (!is_numeric($beta) or $beta > 1 or $beta < 0) {
            return false;
        }
        $numEpoch = $_POST['epoch'];
        if (!is_numeric($numEpoch) or $numEpoch < 0) {
            return false;
        }
        $thresh = $_POST['thresh'];
        if (!is_numeric($thresh) or $thresh > 1 or $thresh < 0) {
            return false;
        }
        $neuronHidden = $_POST['neuronHidden'];
        if (!is_numeric($neuronHidden) or $neuronHidden < 0) {
            return false;
        }
        $sample = $_POST['sample'];
        if (!is_numeric($sample) or $sample < 0) {
            return false;
        }

        $layersSize = array(2, $neuronHidden, 1);
        $numLayers = count($layersSize);
        
        return BackPropagation::make($numLayers, $layersSize, $beta, $alpha)->app($learnData, $testData, $sample, $thresh, $numEpoch);
    }

}
