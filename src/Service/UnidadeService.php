<?php

/*
 * This file is part of the Novo SGA project.
 *
 * (c) Rogerio Lino <rogeriolino@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service;

use App\Entity\Unidade;
use App\Entity\UnidadeMeta;

/**
 * UnidadeService.
 *
 * @author Rogério Lino <rogeriolino@gmail.com>
 */
class UnidadeService extends StorageAwareService
{
    /**
     * Cria ou retorna um metadado da unidade caso o $value seja null (ou ocultado).
     *
     * @param Unidade $unidade
     * @param string  $name
     * @param string  $value
     *
     * @return UnidadeMeta
     */
    public function meta(Unidade $unidade, $name, $value = null)
    {
        $repo = $this->storage->getRepository(UnidadeMeta::class);
        
        if ($value === null) {
            $metadata = $repo->get($unidade, $name);
        } else {
            $metadata = $repo->set($unidade, $name, $value);
        }
        
        return $metadata;
    }
}