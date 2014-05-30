<?php
namespace Payum\Core\Model;

use Payum\Core\Security\SensitiveValue;
use Payum\Core\Security\Util\Mask;

class CreditCard implements CreditCardInterface
{
    /**
     * @var string
     */
    protected $token;

    /**
     * @var string
     */
    protected $brand;

    /**
     * @var SensitiveValue
     */
    protected $holder;

    /**
     * @var string
     */
    protected $maskedHolder;

    /**
     * @var SensitiveValue
     */
    protected $number;

    /**
     * @var string
     */
    protected $maskedNumber;

    /**
     * @var SensitiveValue
     */
    protected $securityCode;

    /**
     * @var \DateTime
     */
    protected $expireAt;

    /**
     * {@inheritDoc}
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * {@inheritDoc}
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * {@inheritDoc}
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * {@inheritDoc}
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * {@inheritDoc}
     */
    public function setHolder($holder)
    {
        $this->holder = $this->wrapBySensitiveValue($holder);

        $this->maskedHolder = Mask::mask($this->holder->peek());
    }

    /**
     * {@inheritDoc}
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * {@inheritDoc}
     */
    public function setMaskedHolder($maskedHolder)
    {
        $this->maskedHolder = $maskedHolder;
    }

    /**
     * {@inheritDoc}
     */
    public function getMaskedHolder()
    {
        return $this->maskedHolder;
    }

    /**
     * {@inheritDoc}
     */
    public function setNumber($number)
    {
        $this->number = $this->wrapBySensitiveValue($number);

        $this->maskedNumber = Mask::mask($this->number->peek());
    }

    /**
     * {@inheritDoc}
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * {@inheritDoc}
     */
    public function setMaskedNumber($maskedNumber)
    {
        return $this->maskedNumber = $maskedNumber;
    }

    /**
     * {@inheritDoc}
     */
    public function getMaskedNumber()
    {
        return $this->maskedNumber;
    }

    /**
     * {@inheritDoc}
     */
    public function setSecurityCode($securityCode)
    {
        $this->securityCode = $this->wrapBySensitiveValue($securityCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getSecurityCode()
    {
        return $this->securityCode;
    }

    /**
     * {@inheritDoc}
     */
    public function getExpireAt()
    {
        return $this->expireAt;
    }

    /**
     * {@inheritDoc}
     */
    public function setExpireAt(\DateTime $date)
    {
        $this->expireAt = $date;
    }

    /**
     * @param mixed $value
     *
     * @return SensitiveValue
     */
    protected function wrapBySensitiveValue($value)
    {
        return $value instanceof SensitiveValue ? $value : new SensitiveValue($value);
    }
}
