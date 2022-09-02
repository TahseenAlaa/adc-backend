<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'full_name'    => $this->full_name,
            'phone'    => $this->phone,
            'occupation'    => $this->occupation,
            'gender'    => $this->igender,
            'birthdate'    => $this->birthdate,
            'address'    => $this->address,
            'smoker'    => $this->smoker,
            'drinker'    => $this->drinker,
            'family_dm'    => $this->family_dm,
            'gestational_dm'    => $this->gestational_dm,
            'weight_baby'    => $this->weight_baby,
            'hypert'    => $this->hypert,
            'family_ihd'    => $this->family_ihd,
            'parity'    => $this->parity,
            'smbg'    => $this->smbg,
            'ihd'    => $this->ihd,
            'cva'    => $this->cva,
            'pvd'    => $this->pvd,
            'neuro'    => $this->neuro,
            'weight'    => $this->weight,
            'height'    => $this->height,
            'wc'    => $this->wc,
            'bmi'    => $this->bmi,
            'hip'    => $this->hip,
            'retino'    => $this->retino,
            'nonpro'    => $this->nonpro,
            'prolif'    => $this->prolif,
            'macul'    => $this->macul,
            'insul'    => $this->insul,
            'amput'    => $this->amput,
            'ed'    => $this->ed,
            'nafld'    => $this->nafld,
            'dermo'    => $this->dermo,
            'dfoot'    => $this->dfoot,
            'date_insulin'    => $this->date_insulin,
            'duration_insulin'    => $this->duration_insulin,
            'duration_dm'    => $this->duration_dm,
            'glycemic'    => $this->glycemic,
            'lipid'    => $this->lipid,
            'pressure'    => $this->pressure,
            'f_height'    => $this->f_height,
            'm_height'    => $this->m_height,
            'mid_height'    => $this->mid_height,
            'fa1c'    => $this->fa1c,
            'sa2c'    => $this->sa2c,
            'referral'    => $this->referral,
            'created_by'    => $this->created_by,
            'updated_by'    => $this->updated_by,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
