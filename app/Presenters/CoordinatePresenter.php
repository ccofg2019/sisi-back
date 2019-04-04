<?php

namespace App\Presenters;

use App\Transformers\CoordinateTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class CoordinatePresenter.
 *
 * @package namespace App\Presenters;
 */
class CoordinatePresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new CoordinateTransformer();
    }
}
