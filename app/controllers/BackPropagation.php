<?php

/**
 * BackPropagation implementacja wstecznej propagacji 
 * błędów metody uczenia stucznych sieci neuronowych.
 *
 *
 * @license http://www.opensource.org/licenses/mit-license.html MIT License
 * @author Pawe´ Bieńko <pawelbienko@live.com>
 */
class BackPropagation {

    const HI = 1.0;
    const LO = 0.1;
    const _RAND_MAX = 32767;

    public $finaloutput = array();
    public $output = null;
    public $outputarray = array();
    public $delta = null;
    public $firstweight = array();
    public $weight = array();
    public $numLayers = null;
    public $layersSize = null;
    public $beta = null;
    public $alpha = null;
    public $prevDwt = null;
    public $learnData = null;
    public $testData = null;
    public $NumPattern = null;
    public $NumInput = null;

    /**
     * Publiczna metoda statyczna tworząca instancje klasy BackPropagation
     *
     * @param integer $numLayers liczba warstw sieci.
     * @param integer $layersSize liczba neuronów w warstwei ukrytej
     * @param float $beta współczynnik uczenia
     * @param float $alpha współczynnik momentum
     * @return object BackPropagation
     */
    public static function make($numLayers, $layersSize, $beta, $alpha) {
        return new BackPropagation($numLayers, $layersSize, $beta, $alpha);
    }
    
    public function __construct($numLayers, $layersSize, $beta, $alpha) {
        $this->alpha = $alpha;
        $this->beta = $beta;
        $this->numLayers = $numLayers;
        $this->layersSize = $layersSize;

        for ($i = 1; $i < $this->numLayers; $i++) {
            for ($j = 0; $j < $this->layersSize[$i]; $j++) {
                for ($k = 0; $k < $this->layersSize[$i - 1] + 1; $k++) {
                    $this->weight[$i][$j][$k] = $this->rando();
                }
                $this->weight[$i][$j][$this->layersSize[$i - 1]] = 1;
            }
        }
        $this->firstweight = $this->weight;

        for ($i = 1; $i < $this->numLayers; $i++) {
            for ($j = 0; $j < $this->layersSize[$i]; $j++) {
                for ($k = 0; $k < $this->layersSize[$i - 1] + 1; $k++) {
                    $this->prevDwt[$i][$j][$k] = (double) 0.0;
                }
            }
        }
    }
    /**
     * Metoda losująca liczby zmiennoprzecinkowe z przedziału od 0 do 1  
     *
     * @return float wylosowana liczba
     */
    private function rando() {
        $randValue = (self::LO + (self::HI - self::LO) 
                     * (mt_rand() / mt_getrandmax()));
        return $randValue;
    }
    /**
     * Metoda obliczająca liniową funkcję aktywacji
     *
     * @param float zmienna funcji
     * @return double wynik funkcji
     */
    private function linear($inputSource) {
        return (double) ($inputSource);
    }
    /**
     * Metoda obliczająca pochodną liniowej funkcję aktywacji
     * @param float $out wynik funkcji aktywacji neuronu
     * @return double wynik pochodnej
     */
    private function linearprim($out) {
        return (double) 1;
    }
    /**
     * Metoda obliczająca sigmoidalną funkcję aktywacji
     * @param float $inputSource wynik sumatora w neuronie
     * @return double wynik obliczenia funkcji
     */
    private function sigmoid($inputSource) {
        return (double) (1.0 / (1.0 + exp(-$inputSource * 1)));//$this->beta)));
    }
    /**
     * Metoda obliczająca pochodną sigmoidalnej funkcję aktywacji
     * @param float $out wynik funkcji aktywacji
     * @return double wynik obliczenia funkcji
     */
    private function sigmiodprim($out) {
        return (double) ($out * (1.0 - $out) * 1);//$this->beta);
    }
    /**
     * Metoda oblicza i zwracająca błąd średniokwadratowy  
     * @param float $out odpowiedź sieci neuronowej
     * @return double $mse bład średniokwadratowy
     */
    private function mse($out) {
        $mse = 0;
        for ($i = 0; $i < $this->layersSize[$this->numLayers - 1]; $i++) {
            $mse+=($out - $this->output[$this->numLayers - 1][$i]) 
                  * ($out - $this->output[$this->numLayers - 1][$i]);
        }
        return (double)$mse;
    }
    /**
     * Metoda zwracająca odpowiedzi sieci  
     * @param int $i= 0 numer neuronu w warstwie wyściowej
     * @return array tablica z odpowidziami sieci
     */
    private function getResponse($i = 0) {
        return $this->output[$this->numLayers - 1][$i];
    }
    /**
     * Metoda obliczająca sieć wprzód wypełnia warstwę wejściową i oblicza 
     * odpowiedź sieci  
     * @param array $inputSource wzorzec uczący
     * @return array $output tablica z odpowiedziami sieci
     */
    private function ffwd($inputSource) {
        for ($j = 0; $j < $this->layersSize[0]; $j++) {
            $this->output[0][$j] = $inputSource[$j];
        }
        for ($i = 1; $i < $this->numLayers; $i++) {
            for ($j = 0; $j < $this->layersSize[$i]; $j++) {
                $sum = 0.0;
                for ($k = 0; $k < $this->layersSize[$i - 1]; $k++) {
                    $sum+=$this->output[$i - 1][$k] * $this->weight[$i][$j][$k];
                    $sum+=$this->weight[$i][$j][$this->layersSize[$i - 1]];
                    if ($i != $this->numLayers) {
                        $this->output[$i][$j] = $this->sigmoid($sum);
                    } else {
                        $this->output[$i][$j] = $this->linear($sum);
                    }
                }
            }
        }
    }
    /**
     * Metoda obliczająca bład popełniany w procesie uczenia 
     * i propagowany wstecz
     * @param array $target właściwa odpowiedź sieci
     */
    public function delta($target) {
        for ($i = 0; $i < $this->layersSize[$this->numLayers - 1]; $i++) {
            $this->delta[$this->numLayers - 1][$i] = $this->linearprim(
                                $this->output[$this->numLayers - 1][$i]
                                ) * (
                                $target 
                                - $this->output[$this->numLayers - 1][$i]
                                );
        }
        for ($i = $this->numLayers - 2; $i > 0; $i--) {
            for ($j = 0; $j < $this->layersSize[$i]; $j++) {
                $sum = 0.0;
                for ($k = 0; $k < $this->layersSize[$i + 1]; $k++) {
                    $sum+=$this->delta[$i + 1][$k] 
                            * $this->weight[$i + 1][$k][$j];
                }
                $this->delta[$i][$j] = $this->sigmiodprim($this->output[$i][$j]) 
                        * $sum;
            }
        }
    }
    /**
     * Metoda obliczająca zmiany wag z dodatkowym parametrem momentum 
     */
    public function momentum() {
        for ($i = 1; $i < $this->numLayers; $i++) {
            for ($j = 0; $j < $this->layersSize[$i]; $j++) {
                for ($k = 0; $k < $this->layersSize[$i - 1]; $k++) {
                    $temp = $this->weight[$i][$j][$k];
                    $this->weight[$i][$j][$k] += $this->alpha * 
                            ($this->weight[$i][$j][$k] 
                            - $this->prevDwt[$i][$j][$k]);
                    $this->prevDwt[$i][$j][$k] = $temp;
                }
                $temp2 = $this->weight[$i][$j][$this->layersSize[$i - 1]];
                $this->weight[$i][$j][$this->layersSize[$i - 1]] 
                            += $this->alpha
                            * ($this->weight[$i][$j][$this->layersSize[$i - 1]] 
                            - $this->prevDwt[$i][$j][$this->layersSize[$i - 1]]);
                $this->prevDwt[$i][$j][$this->layersSize[$i - 1]] = $temp2;
            }
        }
    }
    /**
     * Metoda obliczająca zmiany wag zgodnie z metoda gradientu największego
     * spadku 
     */
    public function steepestDescent() {
        for ($i = 1; $i < $this->numLayers; $i++) {
            for ($j = 0; $j < $this->layersSize[$i]; $j++) {
                for ($k = 0; $k < $this->layersSize[$i - 1]; $k++) {
                    $this->weight[$i][$j][$k] += $this->beta 
                            * $this->delta[$i][$j] * $this->output[$i - 1][$k];
                }
                $this->weight[$i][$j][$this->layersSize[$i - 1]] 
                        += $this->beta * $this->delta[$i][$j] 
                        * $this->output[$i - 1][$k];
            }
        }
    }
    /**
     * Metoda wykonująca algorytm uczenia sieci
     * @param array $inputSource wzorzec uczący
     * @param int $target odpowiedź
     */
    private function bpgt($inputSource, $target) {
        $this->ffwd($inputSource);
        $this->delta($target);
        $this->momentum();
        $this->steepestDescent();
    }
    /**
     * Metoda wykonująca proces uczenia z dostosowaniem jej do potrzb aplikacji
     * @param array $learnData wzorzec uczący
     * @param array $testData tablica odpowiedzi
     * @param integer $sample parametr częstotliwości wyświetlania
     * @param int $thresh próg dokładności uczenia poniżej którego odpowiedz
     *  uznawana jest za poprawną
     * @param int $numepoch maksymalna liczba epok
     */
    public function app($learnData, $testData, $sample, $thresh, $numEpoch) {
    
        $NumPattern = count($learnData); // Lines
        $NumInput = count($learnData[0]); // Columns
        for ($e = 0; $e < $numEpoch; $e++) {
            $mse = 0.0;
            for ($i = 0; $i < 4; $i++) {
                $this->bpgt($learnData[$i], $learnData[$i][$NumInput - 1]);
                $mse += $this->mse($learnData[$i][$NumInput - 1]);
            }
            $mse = $mse/4; 
            if ($e % $sample == 0) {
                $this->outputarray[] = array($e, $mse);
            }

            if ($mse < $thresh) {
                break;
            }
        }
        if ($e <= 100) {
            $up = 10;
        } elseif ($e > 100 and $e <= 1000) {
            $up = 20;
        } elseif ($e > 1000 and $e <= 10000) {
            $up = 100;
        } elseif ($e > 10000 and $e <= 100000) {
            $up = 200;
        }
        $this->outputarray[] = array($e, $mse);
        $this->outputarray[] = array($e + $up,);
        for ($i = 0; $i < $NumPattern; $i++) {
            $this->ffwd($testData[$i]);
            $a[] = (double) $this->getResponse();
        }
        return $this->datatable(
                        $this->finaloutput = array(
                            'outputarray' => array($this->outputarray),
                            'firstweight' => array($this->firstweight),
                            'weight' => array($this->weight),
                            'score' => $a,
                            'epoch' => array($e)
                            )
                        );
    }
    /**
     * Metoda pomocnicza konwertująca dane potrzebne do prezentacji działania
     * @param array $data dane do konwersji
     */
    public function datatable($data) {
        if (!empty($data)) {

            return $this->json($data);
        }
    }
    /**
     * Metoda metoda pomocnicza konwertująca do formatu json
     * @param array $data dane do konwersji
     */
    public function json($data) {
        $this->content = json_encode($data);
        $this->format = 'json';
        return $this;
    }
    /**
     * Metoda metoda pomocnicza zwracająca dane
     */
    public function display() {
        if ($this->format == 'json') {
            header('Content-type: application/json');
            die($this->content);
        }
        return $this->content;
    }

}
//http://sknbo.ue.poznan.pl/neuro/ssn/pliki/jednokier/jednokier4.html
//http://www.ai.c-labtech.net/sn/sneuro.html
//http://www.k0pper.republika.pl/sieci.htm
//http://galaxy.uci.agh.edu.pl/~vlsi/AI/wstep/
//http://home.agh.edu.pl/~tad/
//http://4programmers.net/Z_pogranicza/Sztuczne_sieci_neuronowe_i_algorytmy_genetyczne
//http://iisi.pcz.pl/nn/modele.php?art=3
//http://www.neurosoft.edu.pl/tkwater/tk/Sztuczna_intel/1a_model_sn_i_architekt.pdf
//http://www.ai.c-labtech.net/sn/pod_prakt.html